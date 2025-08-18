package main

import (
	"encoding/json"
	"io"
	"log"
	"net/http"
	"os"
	"path/filepath"

	"github.com/Murodkadirkhanoff/chashma-video-uploader/handler"
	"github.com/aws/aws-sdk-go/aws"
	"github.com/aws/aws-sdk-go/aws/credentials"
	"github.com/aws/aws-sdk-go/aws/session"
	"github.com/aws/aws-sdk-go/service/s3/s3manager"

	"github.com/joho/godotenv"
)

func uploadLocal(w http.ResponseWriter, r *http.Request) {
	// Ограничим размер входящих данных (например, 2 ГБ)
	r.Body = http.MaxBytesReader(w, r.Body, 2<<30)

	// Читаем файл из формы
	file, header, err := r.FormFile("video")
	if err != nil {
		http.Error(w, "file error: "+err.Error(), http.StatusBadRequest)
		return
	}
	defer file.Close()

	// Создаем папку, если её нет
	if err := os.MkdirAll("uploads", os.ModePerm); err != nil {
		http.Error(w, "cannot create uploads dir: "+err.Error(), http.StatusInternalServerError)
		return
	}

	// Путь для сохранения
	filePath := filepath.Join("uploads", header.Filename)

	// Создаём файл на диске
	dst, err := os.Create(filePath)
	if err != nil {
		http.Error(w, "cannot create file: "+err.Error(), http.StatusInternalServerError)
		return
	}
	defer dst.Close()

	// Копируем содержимое
	if _, err := io.Copy(dst, file); err != nil {
		http.Error(w, "copy error: "+err.Error(), http.StatusInternalServerError)
		return
	}

	// Ответ
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(map[string]string{
		"path": filePath,
	})
}

func main() {
	// Загружаем конфиг из env
	err := godotenv.Load(("../../.env"))
	if err != nil {
		log.Fatalf("Error loading .env file: %v", err)
	}

	wasabiEndpoint := os.Getenv("WASABI_ENDPOINT") // например: "s3.eu-central-1.wasabisys.com"
	wasabiRegion := os.Getenv("WASABI_REGION")     // например: "eu-central-1"
	wasabiKey := os.Getenv("WASABI_ACCESS_KEY")
	wasabiSecret := os.Getenv("WASABI_SECRET_KEY")
	bucketName := os.Getenv("WASABI_BUCKET")

	// AWS сессия (для Wasabi просто указываем endpoint)
	sess, err := session.NewSession(&aws.Config{
		Region:           aws.String(wasabiRegion),
		Endpoint:         aws.String(wasabiEndpoint),
		Credentials:      credentials.NewStaticCredentials(wasabiKey, wasabiSecret, ""),
		S3ForcePathStyle: aws.Bool(true), // важно для некоторых S3-провайдеров
	})
	if err != nil {
		log.Fatalf("Ошибка создания AWS сессии: %v", err)
	}

	// S3 uploader с настройками чанков и потоков
	uploader := s3manager.NewUploader(sess, func(u *s3manager.Uploader) {
		u.PartSize = 20 * 1024 * 1024 // 20 MB
		u.Concurrency = 10            // 5 потоков
	})

	uploadHandler := &handler.UploadHandler{
		S3Uploader: uploader,
		Bucket:     bucketName,
	}

	http.HandleFunc("/upload-video", uploadHandler.Upload)
	http.HandleFunc("/upload-local", uploadLocal)

	log.Println("Сервер запущен на :8080")
	log.Fatal(http.ListenAndServe(":8080", nil))
}

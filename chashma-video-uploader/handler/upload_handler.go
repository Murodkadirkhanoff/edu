package handler

import (
	"log"
	"net/http"
	"time"

	"github.com/aws/aws-sdk-go/aws"
	"github.com/aws/aws-sdk-go/service/s3/s3manager"
)

type UploadHandler struct {
	S3Uploader *s3manager.Uploader
	Bucket     string
}

func (h *UploadHandler) Upload(w http.ResponseWriter, r *http.Request) {
	start := time.Now()
	// Ограничиваем размер тела (10 GB)
	r.Body = http.MaxBytesReader(w, r.Body, 10<<30)
	log.Printf("MaxByte: %v", time.Since(start))

	start = time.Now()
	mr, err := r.MultipartReader()
	if err != nil {
		http.Error(w, "multipart error: "+err.Error(), http.StatusBadRequest)
		return
	}
	log.Printf("Reader: %v", time.Since(start))

	start = time.Now()
	for {
		part, err := mr.NextPart()
		if err != nil {
			break
		}

		if part.FormName() == "video" {
			log.Println("Начинаем загрузку в S3...")

			uploadStart := time.Now()
			result, err := h.S3Uploader.Upload(&s3manager.UploadInput{
				Bucket: aws.String(h.Bucket),
				Key:    aws.String(part.FileName()),
				Body:   part, // поток напрямую
			})
			if err != nil {
				http.Error(w, "upload error: "+err.Error(), http.StatusInternalServerError)
				return
			}
			log.Printf("Загрузка в S3 заняла %v", time.Since(uploadStart))

			w.Header().Set("Content-Type", "application/json")
			w.Write([]byte(`{"path":"` + result.Location + `"}`))
			log.Printf("Общее время запроса: %v", time.Since(start))
			return
		}
	}
	log.Printf("Loop: %v", time.Since(start))

	http.Error(w, "video file not found", http.StatusBadRequest)
}

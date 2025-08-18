# syntax=docker/dockerfile:1

# Используем легкий образ Golang
FROM golang:1.24.3-alpine AS builder

# Переменные окружения
ENV CGO_ENABLED=0 GOOS=linux GOARCH=amd64

# Рабочая директория
WORKDIR /app

# Копируем go.mod и go.sum
COPY go.mod go.sum ./

# Загружаем зависимости
RUN go mod download

# Копируем весь проект
COPY . .

# Собираем бинарник
RUN go build -o uploader ./cmd/server

# --- Финальный образ ---
FROM alpine:3.19

WORKDIR /app

# Копируем бинарник из builder
COPY --from=builder /app/uploader .

# Копируем .env (если нужен в контейнере)
COPY .env .

# Экспонируем порт
EXPOSE 8080

# Запускаем
CMD ["./uploader"]

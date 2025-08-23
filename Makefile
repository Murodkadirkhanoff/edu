# =============================
# Makefile для управления Docker
# =============================

# Запуск локальной разработки
up-local:
	sudo docker compose -f docker-compose.local.yml up -d

# Запуск продакшена (detach)
up-prod:
	docker compose -f docker-compose.prod.yml up -d

# Остановка контейнеров (локальных или продовых)
down:
	docker compose down

# Пересобрать контейнеры (например, после обновления кода/зависимостей)
build-local:
	docker compose -f docker-compose.local.yml up --build

build-prod:
	docker compose -f docker-compose.prod.yml up --build -d

# Просмотр логов
logs:
	docker compose logs -f

.PHONY: help install setup dev build test migrate fresh seed optimize clear-cache

help:
	@echo "Доступные команды:"
	@echo "  make install      - Установка зависимостей (composer + npm)"
	@echo "  make setup        - Первоначальная настройка проекта"
	@echo "  make dev          - Запуск сервера разработки"
	@echo "  make build        - Сборка assets для продакшена"
	@echo "  make test         - Запуск тестов"
	@echo "  make migrate      - Выполнение миграций"
	@echo "  make fresh        - Сброс базы данных и миграция"
	@echo "  make seed         - Заполнение базы данных тестовыми данными"
	@echo "  make optimize     - Оптимизация приложения"
	@echo "  make clear-cache  - Очистка кэша"

install:
	docker compose run --rm app composer install
	npm install

setup:
	@echo "Настройка проекта..."
	cp .env.example .env || true
	docker compose run --rm app composer install
	docker compose run --rm web php artisan key:generate
	docker compose run --rm web php artisan migrate --force
	npm install
	npm run build
	@echo "Настройка завершена!"

dev:
	docker compose up -d web

build:
	npm run build

test:
	docker compose run --rm web php artisan test

migrate:
	docker compose run --rm web php artisan migrate

fresh:
	docker compose run --rm web php artisan migrate:fresh --seed

seed:
	docker compose run --rm web php artisan db:seed

optimize:
	docker compose run --rm web php artisan config:cache
	docker compose run --rm web php artisan route:cache
	docker compose run --rm web php artisan view:cache

clear-cache:
	docker compose run --rm web php artisan config:clear
	docker compose run --rm web php artisan route:clear
	docker compose run --rm web php artisan view:clear
	docker compose run --rm web php artisan cache:clear

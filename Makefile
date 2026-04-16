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
	composer install
	npm install

setup:
	@echo "Настройка проекта..."
	cp .env.example .env || true
	composer install
	php artisan key:generate
	php artisan migrate --force
	npm install
	npm run build
	@echo "Настройка завершена!"

dev:
	php artisan serve

build:
	npm run build

test:
	php artisan test

migrate:
	php artisan migrate

fresh:
	php artisan migrate:fresh --seed

seed:
	php artisan db:seed

optimize:
	php artisan config:cache
	php artisan route:cache
	php artisan view:cache

clear-cache:
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	php artisan cache:clear

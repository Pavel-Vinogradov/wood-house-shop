# Wood House Shop

Интернет-магазин деревянных домов и бань на Laravel.

## Требования

- PHP >= 8.3
- Composer
- Node.js >= 18
- NPM

## Установка

### 1. Клонирование репозитория

```bash
git clone git@github.com:Pavel-Vinogradov/wood-house-shop.git
cd wood-house-shop
```

### 2. Установка зависимостей

```bash
composer install
npm install
```

### 3. Настройка окружения

```bash
cp .env.example .env
php artisan key:generate
```

Отредактируйте файл `.env` при необходимости:
- Настройки базы данных
- URL приложения
- Другие параметры

### 4. Выполнение миграций

```bash
php artisan migrate
```

### 5. Сборка assets

```bash
npm run build
```

## Запуск

### Режим разработки

```bash
php artisan serve
npm run dev
```

Или используйте Makefile:

```bash
make dev
```

### Режим продакшена

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Makefile

Доступные команды:

```bash
make help          # Показать все доступные команды
make install       # Установка зависимостей (composer + npm)
make setup         # Первоначальная настройка проекта
make dev           # Запуск сервера разработки
make build         # Сборка assets для продакшена
make test          # Запуск тестов
make migrate       # Выполнение миграций
make fresh         # Сброс базы данных и миграция
make seed          # Заполнение базы данных тестовыми данными
make optimize      # Оптимизация приложения
make clear-cache   # Очистка кэша
```

## Структура проекта

```
app/
├── Http/Controllers/    # Контроллеры
├── Models/Eloquent/     # Eloquent модели
├── Repositories/        # Репозитории (доступ к данным)
├── Services/            # Сервисы (бизнес-логика)
resources/
├── views/              # Blade шаблоны
├── css/                # CSS файлы
└── js/                 # JavaScript файлы
```

## Технологии

- Laravel 13
- Filament 5.x (админ-панель)
- Tailwind CSS
- Vite
- Alpine.js

## Лицензия

MIT

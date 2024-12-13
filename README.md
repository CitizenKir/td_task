# Тестовое задание TradeDealer

Задание сделано на Laravel

## Запуск проекта

1. **Скопировать переменные окружения:**
   ```bash
   cp .env.example .env

2. **Установить зависимости:**
   ```bash
   docker run --rm --interactive --tty --volume $(pwd):/app composer install --ignore-platform-reqs --no-scripts

3. **Собрать приложение:**
   ```bash
   docker-compose build
   
4. **Выполнить миграцию:**
   ```bash
   sail artisan migrate

5. **Заполнить базу:**
   ```bash
   sail artisan db:seed

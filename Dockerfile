FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate
RUN php artisan config:cache

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]

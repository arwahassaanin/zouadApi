FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y unzip git libzip-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p storage/certs

COPY storage/certs/ca.pem /app/storage/certs/ca.pem
RUN chmod 644 /app/storage/certs/ca.pem || true

RUN chmod -R 777 storage bootstrap/cache

RUN php artisan key:generate || true

RUN php artisan storage:link || true

CMD bash -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}"

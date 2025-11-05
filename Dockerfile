# استخدم PHP 8.2 CLI
FROM php:8.2-cli

# مجلد العمل داخل الحاوية
WORKDIR /app

# نسخ كل ملفات المشروع
COPY . .

# تثبيت الأدوات اللازمة وامتدادات PHP
RUN apt-get update && apt-get install -y unzip git libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تثبيت تبعيات المشروع
RUN composer install --no-dev --optimize-autoloader

# إنشاء ملف .env من المثال قبل توليد APP_KEY
COPY .env.example .env

# توليد مفتاح التطبيق
RUN php artisan key:generate

# الأمر الافتراضي لتشغيل Laravel
CMD php artisan serve --host 0.0.0.0 --port $PORT

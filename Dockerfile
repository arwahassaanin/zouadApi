# استخدام PHP 8.2 CLI مع Apache أو بدون Apache
FROM php:8.2-cli

# إنشاء مجلد العمل داخل الحاوية
WORKDIR /app

# نسخ جميع الملفات من المشروع للحاوية
COPY . .

# تثبيت الأدوات اللازمة وامتدادات PHP
RUN apt-get update && apt-get install -y unzip git libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تثبيت تبعيات المشروع
RUN composer install --no-dev --optimize-autoloader

# توليد APP_KEY تلقائيًا عند تشغيل الحاوية
RUN php artisan key:generate

# تحديد الأمر الافتراضي لتشغيل التطبيق
CMD php artisan serve --host 0.0.0.0 --port $PORT

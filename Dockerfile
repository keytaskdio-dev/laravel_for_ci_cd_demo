# 1. 使用官方輕量級 PHP 8.2 + Apache 映像檔
FROM php:8.2-apache

# 2. 安裝 Laravel 所需的系統套件與 SQLite 驅動
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_sqlite

# 3. 開啟 Apache 的 mod_rewrite 模組 (Laravel 路由必備)
RUN a2enmod rewrite

# 4. 將 Apache 的根目錄指向 Laravel 的 public 資料夾
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. 將專案程式碼複製進容器內
COPY . /var/www/html

# 6. 安裝 Composer 並執行依賴套件安裝
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# 7. 設定目錄權限 (讓 Apache 有權限讀寫 storage 與 database)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# 8. 設定容器預設開在 8080 埠號 (Cloud Run 的預設通訊埠)
EXPOSE 8080
ENV PORT=8080
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

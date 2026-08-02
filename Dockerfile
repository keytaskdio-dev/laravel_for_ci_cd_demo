# ==========================================
# 階段 1：編譯前端資源 (Node.js)
# ==========================================
FROM node:20 AS frontend-builder
WORKDIR /app

# 複製 package 相關檔案並安裝 node_modules
COPY package*.json ./
RUN npm install

# 複製所有檔案並執行前端打包
COPY . .
RUN npm run build

# ==========================================
# 階段 2：PHP + Apache 執行環境
# ==========================================
FROM php:8.3-apache

# 1. 複製擴充套件安裝工具
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# 2. 安裝系統基本工具與 PHP 擴充套件
RUN apt-get update && apt-get install -y \
    zip unzip git curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && install-php-extensions gd pdo pdo_sqlite mbstring exif pcntl bcmath

# 3. 安裝 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. 設定工作目錄與 Apache Document Root
WORKDIR /var/www/html
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && a2enmod rewrite

# 5. 修改 Apache 監聽 Port 為 8080 (符合 Cloud Run 要求)
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

# 6. 複製專案原始碼
COPY . /var/www/html

# 🔥【關鍵修正】將階段 1 編譯好的 public/build 複製進來，覆蓋掉舊的檔案！
COPY --from=frontend-builder /app/public/build /var/www/html/public/build

# 7. 安裝 Composer 套件與優化
RUN composer install --no-dev --optimize-autoloader

# 8. 建立 SQLite 資料庫檔案、清理快取與設定權限
RUN touch /var/www/html/database/database.sqlite \
    && php artisan view:clear \
    && php artisan config:clear \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 8080

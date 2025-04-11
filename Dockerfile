FROM php:8.2-apache

# Instalación de extensiones y utilidades
RUN apt-get update && \
    apt-get install -y libpq-dev git unzip && \
    docker-php-ext-install pdo pdo_pgsql pgsql && \
    a2enmod rewrite && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copia de archivos
COPY . /var/www/html/

# Configuración de Apache
RUN sed -i 's!/var/www/html!/var/www/html/sisgestionescolar/public!g' /etc/apache2/sites-available/000-default.conf

# Permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

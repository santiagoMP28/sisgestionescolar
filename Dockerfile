FROM php:8.2-apache

# Instalar dependencias
RUN apt-get update && \
    apt-get install -y libpq-dev git unzip && \
    docker-php-ext-install pdo pdo_pgsql pgsql && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copiar archivos de la app
COPY . /var/www/html/

# Cambiar DocumentRoot a public/
RUN sed -i 's!/var/www/html!/var/www/html/sisgestionescolar/public!g' /etc/apache2/sites-available/000-default.conf

# Activar mod_rewrite
RUN a2enmod rewrite

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

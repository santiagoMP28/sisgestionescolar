FROM php:8.1-apache

# Copia todos los archivos del proyecto
COPY . /var/www/html/

# Instala las extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilita mod_rewrite si usas URLs amigables
RUN a2enmod rewrite

# Configura el working directory
WORKDIR /var/www/html

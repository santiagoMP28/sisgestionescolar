FROM php:8.2-apache

# Instalar extensión de MySQL (pdo_mysql)
RUN docker-php-ext-install pdo pdo_mysql

# Copiar todos los archivos al contenedor
COPY . /var/www/html/

# Cambiar el DocumentRoot a public/
RUN sed -i 's!/var/www/html!/var/www/html/sisgestionescolar/public!g' /etc/apache2/sites-available/000-default.conf

# Activar mod_rewrite
RUN a2enmod rewrite

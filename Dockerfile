FROM php:8.1-apache

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar archivos del directorio público al directorio web de Apache
COPY sisgestionescolar/public/ /var/www/html/

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configuración de Apache
COPY sisgestionescolar/public/.htaccess /var/www/html/.htaccess

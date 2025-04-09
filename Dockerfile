FROM php:8.2-apache

# Instalar extensiones necesarias (opcional)
RUN docker-php-ext-install mysqli

# Copiar todo el contenido al contenedor
COPY sisgestionescolar/ /var/www/html/

# Activar mod_rewrite
RUN a2enmod rewrite

# Configurar el directorio raíz
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Ajustar apache config
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Dar permisos (opcional)
RUN chown -R www-data:www-data /var/www/html

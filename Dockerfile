FROM php:8.2-apache

# Instalación de extensiones y utilidades
RUN apt-get update && \
    apt-get install -y libpq-dev git unzip && \
    docker-php-ext-install pdo pdo_pgsql pgsql && \
    a2enmod rewrite && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copia de archivos de la aplicación
COPY . /var/www/html/

# Configuración de Apache para que el DocumentRoot sea /public
RUN sed -i 's!/var/www/html!/var/www/html/sisgestionescolar/public!g' /etc/apache2/sites-available/000-default.conf

# Crear enlaces simbólicos para acceso a carpetas fuera de /public
RUN ln -s /var/www/html/sisgestionescolar/admin /var/www/html/sisgestionescolar/public/admin && \
    ln -s /var/www/html/sisgestionescolar/docentes /var/www/html/sisgestionescolar/public/docentes && \
    ln -s /var/www/html/sisgestionescolar/estudiantes /var/www/html/sisgestionescolar/public/estudiantes

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Exponer puerto
EXPOSE 80

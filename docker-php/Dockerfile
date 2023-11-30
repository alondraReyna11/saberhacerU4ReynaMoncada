# Usa la imagen base de PHP con Apache
FROM php:7.4-apache

# Instala las extensiones necesarias de PHP y herramientas
RUN apt-get update && \
    apt-get install -y \
        libpq-dev \
        libzip-dev \
        unzip \
        git \
        && docker-php-ext-install pdo_mysql mysqli zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos del proyecto al contenedor
COPY src/ /var/www/html/

# Configura Apache para el sitio
RUN a2enmod rewrite

# Expone el puerto 80 para el servidor Apache
EXPOSE 80

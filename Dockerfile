# Utilisez l'image de base PHP Apache
FROM php:8.0-apache

# Installez les dépendances nécessaires pour l'extension pdo_mysql
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# Copiez vos fichiers de l'application web (s'ils existent)
COPY ./php /var/www/html/
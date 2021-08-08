FROM composer:2 as build
WORKDIR /app
COPY ./service_provider /app
RUN composer install

FROM php:7.3.29-apache
EXPOSE 80
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
COPY --from=build /app /app
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN mkdir -p /app/public/storage/perfil
RUN chown -R www-data:www-data /app
RUN a2enmod rewrite

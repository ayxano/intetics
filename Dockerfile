FROM php:8.2-apache
ENV APPLICATION_PATH=/var/www
ENV APACHE_DOCUMENT_ROOT=${APPLICATION_PATH}/public
ENV ACCEPT_EULA=Y

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite
RUN apt-get update
RUN apt-get install -y libpng-dev libonig-dev libxml2-dev zip unzip libpq-dev apt-transport-https libzip-dev
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ADD . $APPLICATION_PATH
WORKDIR $APPLICATION_PATH
RUN mv .env.example .env

RUN composer install --no-interaction
RUN chown -R www-data:www-data $APPLICATION_PATH

EXPOSE 80
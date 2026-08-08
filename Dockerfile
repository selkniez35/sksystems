FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libicu-dev libzip-dev default-libmysqlclient-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql intl zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

ENV APP_ENV=prod
ENV APP_DEBUG=0
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

RUN npm install && npm run build

EXPOSE 10000

# variables_order=EGPCS est nécessaire pour que les env vars définies par le
# host (docker compose, etc.) atteignent bien $_ENV/$_SERVER à chaque
# requête. Sans ça, le serveur intégré de PHP ne les expose que via
# getenv(), que le composant Dotenv de Symfony ne lit pas, et APP_ENV/
# DATABASE_URL etc. retomberaient silencieusement sur ce qui est commité
# dans .env.
CMD ["sh", "-c", "php -d variables_order=EGPCS -S 0.0.0.0:${PORT:-10000} -t public"]

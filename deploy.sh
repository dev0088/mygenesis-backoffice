#!/bin/sh

# Stop previous dockers
docker-compose stop
docker-compose down

# Remove caches
yes | docker system prune

# Copy env file
ENVFILE="./.env"
EXENVFILE="./.env.example"

if test -f "$ENVFILE"; then
    echo "$ENVFILE exist"
else
    cp "$EXENVFILE" "$ENVFILE"
fi

# Run dockers as daemon
docker-compose up -d --build

# Install composer
# docker-compose exec app composer require doctrine/dbal
docker-compose exec app composer install

# Generate key
docker-compose exec app php artisan key:generate

# Save config files
docker-compose exec app php artisan config:cache

# Migrate database
docker-compose exec app php artisan migrate

# Renew certificates for this domain
# docker-compose exec ooloraopenresty openssl req -new -newkey rsa:2048 \
#  -days 3650 -nodes -x509 \
#  -subj '/CN=app.oolora.com' \
#  -keyout /etc/ssl/app.oolora.com.key \
#  -out /etc/ssl/app.oolora.com.crt

# Remove caches
yes | docker system prune

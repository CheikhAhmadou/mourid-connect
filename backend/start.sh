#!/bin/bash

echo "==> Starting Mourid Connect API..."

echo "==> Running migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

echo "==> Seeding database..."
php artisan db:seed --force || echo "Seeding failed, continuing..."

echo "==> Generating API docs..."
php artisan scribe:generate || true

echo "==> Caching config..."
php artisan config:cache || true
php artisan route:cache || true
php artisan storage:link || true

echo "==> Starting server on port ${PORT:-8080}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}

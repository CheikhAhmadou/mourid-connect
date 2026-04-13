#!/bin/bash

echo "==> Starting Mourid Connect API..."

echo "==> Running migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

echo "==> Seeding database..."
php artisan db:seed --force || echo "Seeding failed, continuing..."

echo "==> Seeding Paris members (idempotent)..."
php artisan db:seed --class=ParisMembersSeeder --force || echo "Paris members seeder failed, continuing..."

echo "==> Seeding Connect content (groups, events, posts)..."
php artisan db:seed --class=ConnectContentSeeder --force || echo "Connect content seeder failed, continuing..."

echo "==> Seeding world members (Dakar, NYC, London, Montreal...)..."
php artisan db:seed --class=WorldMembersSeeder --force || echo "World members seeder failed, continuing..."

echo "==> Seeding social interactions (follows, likes, comments, notifications)..."
php artisan db:seed --class=SocialInteractionsSeeder --force || echo "Social interactions seeder failed, continuing..."

echo "==> Caching config..."
php artisan config:cache || true
php artisan route:cache || true
php artisan storage:link || true

echo "==> Starting server on port ${PORT:-8080}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}

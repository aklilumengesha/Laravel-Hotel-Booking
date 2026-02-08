#!/usr/bin/env bash
# Render Start Script

set -e

echo "🚀 Starting application..."

echo "📊 Running database migrations..."
php artisan migrate --force

echo "🌱 Seeding database (first time only)..."
php artisan db:seed --force || echo "Database already seeded"

echo "🔗 Creating storage link..."
php artisan storage:link || echo "Storage link already exists"

echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear

echo "🌐 Starting web server on port ${PORT:-8080}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}

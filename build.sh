#!/usr/bin/env bash
# Render Build Script

set -e

echo "🔨 Starting build process..."

echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

echo "📊 Running database migrations..."
php artisan migrate --force

echo "🌱 Seeding database..."
php artisan db:seed --force || echo "Database already seeded"

echo "🔗 Creating storage link..."
php artisan storage:link || echo "Storage link already exists"

echo "⚙️  Caching configuration..."
php artisan config:cache

echo "🛣️  Caching routes..."
php artisan route:cache

echo "👁️  Caching views..."
php artisan view:cache

echo "✅ Build complete!"


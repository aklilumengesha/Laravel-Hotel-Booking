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

echo "⚙️  Caching configuration..."
php artisan config:cache

echo "🛣️  Caching routes..."
php artisan route:cache

echo "👁️  Caching views..."
php artisan view:cache

echo "✅ Application ready! Starting services..."

# Start supervisor
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf


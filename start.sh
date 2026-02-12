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

echo "🔐 Setting proper permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear || echo "Cache clear skipped"

echo "✅ Application ready! Starting services..."

# Start supervisor
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf


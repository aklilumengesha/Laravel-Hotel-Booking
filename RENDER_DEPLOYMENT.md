# Render Deployment Guide - Laravel Hotel Booking System

## Why Render?
- ✅ **100% FREE Tier** (No credit card required!)
- ✅ **Automatic Deployments** from GitHub
- ✅ **Free PostgreSQL Database**
- ✅ **Easy Setup:** 5 minutes
- ✅ **Better than Heroku:** Free tier doesn't sleep

---

## Step 1: Prepare Your Project

### A. Create render.yaml

Create `render.yaml` in your project root:

```yaml
services:
  - type: web
    name: hotel-booking
    env: php
    buildCommand: |
      composer install --no-dev --optimize-autoloader
      php artisan config:cache
      php artisan route:cache
      php artisan view:cache
    startCommand: |
      php artisan migrate --force
      php artisan serve --host=0.0.0.0 --port=$PORT
    envVars:
      - key: APP_KEY
        generateValue: true
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: false
      - key: DATABASE_URL
        fromDatabase:
          name: hotel-booking-db
          property: connectionString

databases:
  - name: hotel-booking-db
    databaseName: hotel_booking
    user: hotel_user
```

### B. Create build script

Create `build.sh` in your root:

```bash
#!/usr/bin/env bash

echo "Running composer install..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Build complete!"
```

Make it executable:
```bash
chmod +x build.sh
```

### C. Create start script

Create `start.sh` in your root:

```bash
#!/usr/bin/env bash

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Creating storage link..."
php artisan storage:link

echo "Starting server..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
```

Make it executable:
```bash
chmod +x start.sh
```

---

## Step 2: Update Database Configuration

Update `config/database.php` to support PostgreSQL:

```php
'pgsql' => [
    'driver' => 'pgsql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '5432'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8',
    'prefix' => '',
    'prefix_indexes' => true,
    'search_path' => 'public',
    'sslmode' => 'prefer',
],
```

Update `.env` for PostgreSQL:
```env
DB_CONNECTION=pgsql
```

---

## Step 3: Push to GitHub

```bash
git add .
git commit -m "Prepare for Render deployment"
git push origin main
```

---

## Step 4: Create Render Account

1. Go to https://render.com
2. Click **"Get Started for Free"**
3. Sign up with GitHub
4. Authorize Render

---

## Step 5: Create Web Service

1. Click **"New +"** → **"Web Service"**
2. Connect your GitHub repository
3. Select `hotel-booking-clean` repository
4. Configure:
   - **Name:** hotel-booking
   - **Environment:** PHP
   - **Build Command:** `./build.sh`
   - **Start Command:** `./start.sh`
   - **Plan:** Free

---

## Step 6: Create PostgreSQL Database

1. Click **"New +"** → **"PostgreSQL"**
2. Configure:
   - **Name:** hotel-booking-db
   - **Database:** hotel_booking
   - **User:** hotel_user
   - **Plan:** Free
3. Click **"Create Database"**

---

## Step 7: Link Database to Web Service

1. Go to your web service
2. Click **"Environment"** tab
3. Add environment variable:
   - **Key:** `DATABASE_URL`
   - **Value:** Copy from PostgreSQL service "Internal Database URL"

---

## Step 8: Configure Environment Variables

In your web service, add these environment variables:

```env
APP_NAME=Hotel Booking
APP_ENV=production
APP_KEY=base64:1t9Ozn2kf7VlJDyvB9Ngx5IfQqE3XjimjSiNkcmRpXQ=
APP_DEBUG=false
APP_URL=https://hotel-booking.onrender.com

DB_CONNECTION=pgsql
DATABASE_URL=[from PostgreSQL service]

SESSION_DRIVER=database
CACHE_DRIVER=database
QUEUE_CONNECTION=sync

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

CHAPA_SECRET_KEY=CHASECK_TEST-cBksYmXnQyIniVGwH7mGpgVWA1WQ3GOC
```

---

## Step 9: Deploy

1. Click **"Manual Deploy"** → **"Deploy latest commit"**
2. Wait 5-10 minutes for build
3. Render will:
   - Install dependencies
   - Run migrations
   - Seed database
   - Start server

---

## Step 10: Access Your Site

Your site will be available at:
```
https://hotel-booking.onrender.com
```

Test:
- Homepage
- Admin login: `/admin/login`
- Customer registration
- Booking flow

---

## Step 11: Set Up Automatic Deployments

✅ **Already enabled!** Every push to `main` branch automatically deploys.

```bash
git add .
git commit -m "Update feature"
git push origin main
# Render automatically deploys!
```

---

## Step 12: Configure Storage (Important!)

Render doesn't have persistent storage. Use **Cloudinary** for images:

### Install Cloudinary:

```bash
composer require cloudinary-labs/cloudinary-laravel
```

### Configure:

Add to `.env`:
```env
CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
FILESYSTEM_DISK=cloudinary
```

Update `config/filesystems.php`:
```php
'cloudinary' => [
    'driver' => 'cloudinary',
    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
    'api_key' => env('CLOUDINARY_API_KEY'),
    'api_secret' => env('CLOUDINARY_API_SECRET'),
],
```

---

## Monitoring & Logs

### View Logs:
1. Go to your service dashboard
2. Click **"Logs"** tab
3. Real-time logs appear here

### View Metrics:
1. Click **"Metrics"** tab
2. See CPU, memory, bandwidth usage

### Database Access:
1. Go to PostgreSQL service
2. Click **"Connect"** for connection details
3. Use any PostgreSQL client (pgAdmin, DBeaver)

---

## Custom Domain

1. In service dashboard, click **"Settings"**
2. Scroll to **"Custom Domain"**
3. Add your domain
4. Update DNS records:
   ```
   CNAME: your-domain.com → hotel-booking.onrender.com
   ```

---

## Database Backups

### Manual Backup:
1. Go to PostgreSQL service
2. Click **"Backups"** tab
3. Click **"Create Backup"**

### Automatic Backups:
- Free tier: Manual only
- Paid tier: Automatic daily backups

---

## Cost Breakdown

**Free Tier:**
- ✅ Web service: FREE (750 hours/month)
- ✅ PostgreSQL: FREE (90 days, then $7/month)
- ✅ Bandwidth: 100GB/month
- ✅ Build minutes: 500/month

**Perfect for:**
- Development
- Small projects
- Portfolio sites
- Testing

---

## Troubleshooting

### Issue: Build Failed
**Solution:**
- Check `build.sh` has execute permissions
- Verify `composer.json` syntax
- Check Render build logs

### Issue: Database Connection Error
**Solution:**
- Verify `DATABASE_URL` is set correctly
- Check PostgreSQL service is running
- Ensure `DB_CONNECTION=pgsql` in .env

### Issue: 500 Error
**Solution:**
- Check logs in Render dashboard
- Verify `APP_KEY` is set
- Run migrations manually via shell

### Issue: Images Not Loading
**Solution:**
- Use Cloudinary for image storage
- Render doesn't support persistent files
- Update upload logic to use Cloudinary

---

## Shell Access

1. Go to your service dashboard
2. Click **"Shell"** tab
3. Run commands:
```bash
php artisan migrate
php artisan db:seed
php artisan cache:clear
```

---

## Migration from MySQL to PostgreSQL

If you have existing MySQL data:

1. Export MySQL data
2. Convert to PostgreSQL format using:
   - https://github.com/lanyrd/mysql-postgresql-converter
   - Or pgLoader tool
3. Import to Render PostgreSQL

---

## Best Practices

✅ Use environment variables for secrets
✅ Enable automatic deployments
✅ Set up Cloudinary for images
✅ Monitor logs regularly
✅ Create database backups
✅ Use CDN for static assets

---

## Comparison: Render vs Others

| Feature | Render | Railway | InfinityFree |
|---------|--------|---------|--------------|
| Setup Time | 5 min | 10 min | 2 hours |
| Free Tier | ✅ Yes | $5 credit | ✅ Yes |
| Auto Deploy | ✅ Yes | ✅ Yes | ❌ No |
| Database | PostgreSQL | MySQL | MySQL |
| Storage | External | External | Limited |
| SSL | ✅ Free | ✅ Free | ✅ Free |
| Custom Domain | ✅ Yes | ✅ Yes | ✅ Yes |

---

## Support

- **Render Docs:** https://render.com/docs
- **Render Community:** https://community.render.com
- **Laravel Docs:** https://laravel.com/docs

---

**Deployment Time:** 5-10 minutes
**Difficulty:** Very Easy
**Cost:** 100% FREE

🚀 Render is the easiest way to deploy Laravel!

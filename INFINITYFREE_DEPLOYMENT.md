# InfinityFree Deployment Guide - Laravel Hotel Booking System

## Prerequisites
- InfinityFree account (free hosting)
- FileZilla or any FTP client
- Your project files ready
- Database backup (if migrating data)

---

## Step 1: Create InfinityFree Account

1. Go to https://infinityfree.net
2. Click "Sign Up" and create a free account
3. Verify your email address
4. Login to your control panel (VistaPanel)

---

## Step 2: Create a New Website

1. In VistaPanel, click **"Create Account"**
2. Choose a subdomain (e.g., `yourhotel.rf.gd`) or use your own domain
3. Wait for account creation (takes 2-5 minutes)
4. Note down your:
   - FTP Hostname
   - FTP Username
   - FTP Password
   - MySQL Database details

---

## Step 3: Create MySQL Database

1. In VistaPanel, go to **"MySQL Databases"**
2. Click **"Create Database"**
3. Enter database name (e.g., `hotel_booking`)
4. Click "Create Database"
5. **IMPORTANT:** Note down:
   - Database Name: `epiz_XXXXXXX_hotel_booking`
   - Database Username: `epiz_XXXXXXX`
   - Database Password: (your password)
   - Database Host: `sql200.infinityfree.com` (or similar)

---

## Step 4: Prepare Your Laravel Project

### A. Update .env File

Create a production `.env` file with these settings:

```env
APP_NAME="Hotel Booking"
APP_ENV=production
APP_KEY=base64:1t9Ozn2kf7VlJDyvB9Ngx5IfQqE3XjimjSiNkcmRpXQ=
APP_DEBUG=false
APP_URL=http://yourhotel.rf.gd

LOG_CHANNEL=stack
LOG_LEVEL=error

# Database Configuration (USE YOUR INFINITYFREE DETAILS)
DB_CONNECTION=mysql
DB_HOST=sql200.infinityfree.com
DB_PORT=3306
DB_DATABASE=epiz_XXXXXXX_hotel_booking
DB_USERNAME=epiz_XXXXXXX
DB_PASSWORD=your_database_password

# Chapa Payment
CHAPA_SECRET_KEY=CHASECK_TEST-cBksYmXnQyIniVGwH7mGpgVWA1WQ3GOC

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### B. Optimize Laravel for Production

Run these commands locally:

```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Generate optimized autoloader
composer install --optimize-autoloader --no-dev
```

---

## Step 5: Prepare Files for Upload

### A. Create Deployment Package

1. **Copy these folders/files to a new folder:**
   ```
   /app
   /bootstrap
   /config
   /database
   /public
   /resources
   /routes
   /storage
   .htaccess (root)
   artisan
   composer.json
   composer.lock
   package.json
   ```

2. **DO NOT upload:**
   - `/node_modules`
   - `/vendor` (will install on server)
   - `.env` (upload separately)
   - `.git`
   - `docker-compose.yml`
   - `Dockerfile`

### B. Modify .htaccess for InfinityFree

Create/update `.htaccess` in root:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

Create/update `public/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

---

## Step 6: Upload Files via FTP

### Using FileZilla:

1. **Open FileZilla**
2. **Connect to FTP:**
   - Host: `ftpupload.net` (or your FTP hostname)
   - Username: `epiz_XXXXXXX`
   - Password: (your FTP password)
   - Port: `21`

3. **Navigate to `/htdocs` folder** (this is your web root)

4. **Upload all files:**
   - Upload all Laravel files to `/htdocs`
   - This may take 15-30 minutes depending on your connection

5. **Set Permissions:**
   - Right-click on `/storage` folder → Permissions → `755`
   - Right-click on `/bootstrap/cache` folder → Permissions → `755`

---

## Step 7: Install Composer Dependencies

**IMPORTANT:** InfinityFree doesn't support SSH, so you need to:

### Option A: Upload vendor folder (Recommended for InfinityFree)

1. Run locally: `composer install --optimize-autoloader --no-dev`
2. Upload the entire `/vendor` folder via FTP
3. This will take time but is the most reliable method

### Option B: Use online PHP shell (Advanced)

Some users upload a PHP shell script to run composer, but this is not recommended for security reasons.

---

## Step 8: Configure Database

### A. Import Database

1. In VistaPanel, go to **"phpMyAdmin"**
2. Select your database
3. Click **"Import"** tab
4. Choose your SQL file or run migrations manually

### B. Run Migrations (if needed)

Create a file `migrate.php` in your root:

```php
<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('migrate', ['--force' => true]);
echo "Migrations completed!";
```

Visit: `http://yourhotel.rf.gd/migrate.php`

**DELETE THIS FILE AFTER USE!**

---

## Step 9: Seed Database

Create a file `seed.php` in your root:

```php
<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('db:seed', ['--force' => true]);
echo "Database seeded!";
```

Visit: `http://yourhotel.rf.gd/seed.php`

**DELETE THIS FILE AFTER USE!**

---

## Step 10: Create Storage Link

Create a file `storage-link.php` in your root:

```php
<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('storage:link');
echo "Storage linked!";
```

Visit: `http://yourhotel.rf.gd/storage-link.php`

**DELETE THIS FILE AFTER USE!**

---

## Step 11: Upload Images

1. Upload all images from `public/uploads` to `/htdocs/public/uploads`
2. Upload all images from `storage/app/public` to `/htdocs/storage/app/public`

---

## Step 12: Final Configuration

### A. Update .env on Server

1. Upload your production `.env` file to `/htdocs/.env`
2. Make sure database credentials are correct

### B. Clear Caches

Create `clear-cache.php`:

```php
<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('config:clear');
$kernel->call('cache:clear');
$kernel->call('view:clear');
$kernel->call('route:clear');
echo "All caches cleared!";
```

Visit: `http://yourhotel.rf.gd/clear-cache.php`

**DELETE THIS FILE AFTER USE!**

---

## Step 13: Test Your Website

1. Visit: `http://yourhotel.rf.gd`
2. Test homepage loads correctly
3. Test admin login: `http://yourhotel.rf.gd/admin/login`
4. Test customer registration
5. Test room booking flow
6. Test payment integration

---

## Step 14: Security Checklist

- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Delete all helper PHP files (migrate.php, seed.php, etc.)
- [ ] Verify `.env` file is not publicly accessible
- [ ] Check file permissions (755 for folders, 644 for files)
- [ ] Test all forms for CSRF protection
- [ ] Verify SSL certificate (if using custom domain)

---

## Common Issues & Solutions

### Issue 1: 500 Internal Server Error
**Solution:**
- Check `.htaccess` files are uploaded
- Verify file permissions (755 for storage and bootstrap/cache)
- Check error logs in VistaPanel

### Issue 2: Database Connection Error
**Solution:**
- Verify database credentials in `.env`
- Use correct database host (sql200.infinityfree.com or similar)
- Check if database exists in phpMyAdmin

### Issue 3: Images Not Loading
**Solution:**
- Run storage:link command
- Check if images are uploaded to correct folders
- Verify file permissions

### Issue 4: CSS/JS Not Loading
**Solution:**
- Check if `public/dist` and `public/dist-front` folders are uploaded
- Clear browser cache
- Check .htaccess rewrite rules

### Issue 5: Session/Cache Issues
**Solution:**
- Clear all caches using clear-cache.php
- Check storage folder permissions
- Verify session driver is set to 'file' in .env

---

## InfinityFree Limitations

⚠️ **Be aware of these limitations:**

1. **No SSH Access** - Can't run artisan commands directly
2. **No Cron Jobs** - Scheduled tasks won't work
3. **Limited PHP Functions** - Some functions may be disabled
4. **File Upload Limit** - Usually 10MB per file
5. **Execution Time** - 30 seconds max
6. **Daily Hits Limit** - 50,000 hits per day
7. **No Email Sending** - Use external SMTP (Gmail, SendGrid)

---

## Alternative: Use Paid Hosting

For better performance and features, consider:
- **Hostinger** ($2.99/month) - Full Laravel support
- **DigitalOcean** ($5/month) - VPS with full control
- **Heroku** (Free tier) - Easy deployment
- **Render** (Free tier) - Modern hosting platform

---

## Support

If you encounter issues:
1. Check InfinityFree forums: https://forum.infinityfree.net
2. Check Laravel logs in `storage/logs/laravel.log`
3. Check VistaPanel error logs
4. Contact InfinityFree support

---

## Backup Strategy

**Always maintain backups:**
1. Database: Export from phpMyAdmin weekly
2. Files: Download via FTP monthly
3. Code: Keep in GitHub (already done)

---

**Deployment Date:** February 8, 2026
**Laravel Version:** 9.52.7
**PHP Version Required:** 8.0+

Good luck with your deployment! 🚀

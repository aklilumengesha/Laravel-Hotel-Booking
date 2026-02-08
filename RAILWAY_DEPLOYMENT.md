# Railway Deployment Guide - Laravel Hotel Booking System

## Why Railway?
- ✅ **Free Tier:** $5 credit/month (enough for small projects)
- ✅ **Automatic Deployments:** Push to GitHub, auto-deploy
- ✅ **Built-in Database:** PostgreSQL/MySQL included
- ✅ **Easy Setup:** 5-10 minutes deployment
- ✅ **Modern Platform:** Better than traditional hosting

---

## Step 1: Prepare Your Project

### A. Update composer.json

Add this to your `composer.json`:

```json
{
    "require": {
        "php": "^8.0",
        "ext-pdo": "*",
        "ext-mbstring": "*"
    },
    "scripts": {
        "post-install-cmd": [
            "php artisan clear-compiled",
            "php artisan optimize"
        ]
    }
}
```

### B. Create Procfile

Create a file named `Procfile` (no extension) in your root:

```
web: vendor/bin/heroku-php-apache2 public/
```

### C. Create nixpacks.toml

Create `nixpacks.toml` in your root:

```toml
[phases.setup]
nixPkgs = ["php82", "php82Extensions.pdo", "php82Extensions.pdo_mysql", "php82Extensions.mbstring"]

[phases.install]
cmds = ["composer install --no-dev --optimize-autoloader"]

[phases.build]
cmds = [
    "php artisan config:cache",
    "php artisan route:cache",
    "php artisan view:cache"
]

[start]
cmd = "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"
```

---

## Step 2: Push to GitHub

```bash
git add .
git commit -m "Prepare for Railway deployment"
git push origin main
```

---

## Step 3: Create Railway Account

1. Go to https://railway.app
2. Click **"Start a New Project"**
3. Sign up with GitHub
4. Authorize Railway to access your repositories

---

## Step 4: Deploy from GitHub

1. Click **"New Project"**
2. Select **"Deploy from GitHub repo"**
3. Choose your `hotel-booking-clean` repository
4. Railway will automatically detect it's a PHP project

---

## Step 5: Add MySQL Database

1. In your Railway project, click **"+ New"**
2. Select **"Database"** → **"Add MySQL"**
3. Railway will create a MySQL database
4. Note the connection details (automatically available as environment variables)

---

## Step 6: Configure Environment Variables

In Railway dashboard, go to **Variables** tab and add:

```env
APP_NAME=Hotel Booking
APP_ENV=production
APP_KEY=base64:1t9Ozn2kf7VlJDyvB9Ngx5IfQqE3XjimjSiNkcmRpXQ=
APP_DEBUG=false
APP_URL=https://your-app.up.railway.app

# Database (Railway provides these automatically)
DB_CONNECTION=mysql
DB_HOST=${MYSQLHOST}
DB_PORT=${MYSQLPORT}
DB_DATABASE=${MYSQLDATABASE}
DB_USERNAME=${MYSQLUSER}
DB_PASSWORD=${MYSQLPASSWORD}

# Session & Cache
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

# Chapa Payment
CHAPA_SECRET_KEY=CHASECK_TEST-cBksYmXnQyIniVGwH7mGpgVWA1WQ3GOC
```

**Note:** Railway automatically provides MySQL variables, so you can reference them with `${MYSQLHOST}`, etc.

---

## Step 7: Run Migrations

### Option A: Using Railway CLI (Recommended)

1. Install Railway CLI:
```bash
npm install -g @railway/cli
```

2. Login:
```bash
railway login
```

3. Link to your project:
```bash
railway link
```

4. Run migrations:
```bash
railway run php artisan migrate --force
railway run php artisan db:seed --force
railway run php artisan storage:link
```

### Option B: Using Web Terminal

1. In Railway dashboard, click on your service
2. Go to **"Settings"** → **"Deploy"**
3. Enable **"Web Terminal"**
4. Open terminal and run:
```bash
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
```

---

## Step 8: Configure Storage

Railway doesn't have persistent storage by default. You need to use S3 or similar.

### Quick Fix: Use Database for Sessions

Update `.env`:
```env
SESSION_DRIVER=database
```

Then run:
```bash
railway run php artisan session:table
railway run php artisan migrate --force
```

---

## Step 9: Upload Images

For production, use **AWS S3** or **Cloudinary** for images.

### Quick Setup with Cloudinary (Free):

1. Sign up at https://cloudinary.com
2. Install package:
```bash
composer require cloudinary-labs/cloudinary-laravel
```

3. Add to `.env`:
```env
CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
```

---

## Step 10: Test Your Deployment

1. Railway will provide a URL like: `https://your-app.up.railway.app`
2. Visit the URL
3. Test admin login: `/admin/login`
4. Test customer registration
5. Test booking flow

---

## Step 11: Custom Domain (Optional)

1. In Railway dashboard, go to **"Settings"**
2. Click **"Domains"**
3. Add your custom domain
4. Update DNS records as instructed
5. Update `APP_URL` in environment variables

---

## Automatic Deployments

✅ **Every push to GitHub automatically deploys!**

```bash
git add .
git commit -m "Update feature"
git push origin main
# Railway automatically deploys!
```

---

## Monitoring & Logs

- **View Logs:** Railway dashboard → "Deployments" → Click deployment
- **Metrics:** Railway dashboard → "Metrics" tab
- **Database:** Railway dashboard → MySQL service → "Data" tab

---

## Cost Breakdown

**Free Tier:**
- $5 credit/month
- ~500 hours of usage
- Perfect for small projects

**Paid Plans:**
- Pay only for what you use
- ~$5-10/month for small apps
- Much cheaper than traditional hosting

---

## Troubleshooting

### Issue: Build Failed
**Solution:**
- Check `nixpacks.toml` configuration
- Verify `composer.json` has correct PHP version
- Check Railway build logs

### Issue: Database Connection Error
**Solution:**
- Verify environment variables are set
- Check MySQL service is running
- Use Railway-provided database variables

### Issue: 500 Error
**Solution:**
- Check logs in Railway dashboard
- Verify `APP_KEY` is set
- Run `railway run php artisan config:clear`

### Issue: Images Not Loading
**Solution:**
- Use S3 or Cloudinary for images
- Railway doesn't support persistent file storage

---

## Migration from Local

1. Export your local database
2. Import to Railway MySQL using phpMyAdmin or CLI
3. Upload images to S3/Cloudinary
4. Update image paths in database

---

## Best Practices

✅ Use environment variables for all secrets
✅ Enable error logging
✅ Set up database backups
✅ Use CDN for static assets
✅ Monitor usage to stay within free tier

---

## Support

- **Railway Docs:** https://docs.railway.app
- **Railway Discord:** https://discord.gg/railway
- **Laravel Docs:** https://laravel.com/docs

---

**Deployment Time:** 10-15 minutes
**Difficulty:** Easy
**Cost:** FREE (with $5/month credit)

🚀 Railway is the modern way to deploy Laravel!

# Deployment Helper Files

These files help you deploy Laravel to InfinityFree (or any hosting without SSH access).

## Files Included

### 1. `.env.production`
- Production environment configuration
- **Action:** Copy this to `.env` and update with your InfinityFree credentials
- Upload to `/htdocs/.env`

### 2. `migrate.php`
- Runs database migrations
- **Action:** Upload to `/htdocs/migrate.php` and visit once
- **⚠️ DELETE AFTER USE!**

### 3. `seed.php`
- Seeds database with initial data
- **Action:** Upload to `/htdocs/seed.php` and visit once
- **⚠️ DELETE AFTER USE!**

### 4. `storage-link.php`
- Creates symbolic link for storage
- **Action:** Upload to `/htdocs/storage-link.php` and visit once
- **⚠️ DELETE AFTER USE!**

### 5. `clear-cache.php`
- Clears all Laravel caches
- **Action:** Upload to `/htdocs/clear-cache.php` and visit when needed
- **⚠️ DELETE AFTER USE!**

## Usage Order

1. Upload all Laravel files via FTP
2. Upload `.env` (configured from `.env.production`)
3. Visit `migrate.php` → Delete file
4. Visit `seed.php` → Delete file
5. Visit `storage-link.php` → Delete file
6. Visit `clear-cache.php` → Delete file
7. Test your website

## Security Warning

⚠️ **IMPORTANT:** These files give direct access to your Laravel application. Always delete them immediately after use to prevent security vulnerabilities.

## Need Help?

Refer to `INFINITYFREE_DEPLOYMENT.md` for complete deployment guide.

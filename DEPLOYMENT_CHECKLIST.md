# InfinityFree Deployment Checklist

## Pre-Deployment (Local)

- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Test application locally one final time
- [ ] Export database backup (if migrating data)
- [ ] Update `.env.production` with InfinityFree credentials

## InfinityFree Setup

- [ ] Create InfinityFree account
- [ ] Create new website/subdomain
- [ ] Note FTP credentials
- [ ] Create MySQL database
- [ ] Note database credentials (host, name, username, password)

## File Upload (via FTP)

- [ ] Connect to FTP using FileZilla
- [ ] Navigate to `/htdocs` folder
- [ ] Upload all Laravel files (except node_modules, .git, vendor initially)
- [ ] Upload `/vendor` folder (this takes longest)
- [ ] Upload `.env` file (renamed from `.env.production`)
- [ ] Upload deployment helper files to root
- [ ] Set permissions: `/storage` → 755
- [ ] Set permissions: `/bootstrap/cache` → 755

## Database Setup

- [ ] Access phpMyAdmin from VistaPanel
- [ ] Select your database
- [ ] Visit `yoursite.rf.gd/migrate.php` to run migrations
- [ ] Visit `yoursite.rf.gd/seed.php` to seed database
- [ ] Verify tables created in phpMyAdmin

## Storage & Cache

- [ ] Visit `yoursite.rf.gd/storage-link.php` to create storage link
- [ ] Upload images to `/htdocs/public/uploads`
- [ ] Upload images to `/htdocs/storage/app/public`
- [ ] Visit `yoursite.rf.gd/clear-cache.php` to clear caches

## Security

- [ ] Delete `migrate.php` from root
- [ ] Delete `seed.php` from root
- [ ] Delete `storage-link.php` from root
- [ ] Delete `clear-cache.php` from root
- [ ] Verify `.env` has `APP_DEBUG=false`
- [ ] Verify `.env` has `APP_ENV=production`
- [ ] Test that `.env` is not publicly accessible

## Testing

- [ ] Visit homepage: `yoursite.rf.gd`
- [ ] Test admin login: `yoursite.rf.gd/admin/login`
- [ ] Test customer registration
- [ ] Test room browsing
- [ ] Test room booking flow
- [ ] Test payment integration
- [ ] Test image loading
- [ ] Test all navigation links
- [ ] Test mobile responsiveness
- [ ] Test contact form
- [ ] Test email functionality

## Post-Deployment

- [ ] Monitor error logs in VistaPanel
- [ ] Check `storage/logs/laravel.log` for errors
- [ ] Set up regular database backups
- [ ] Document admin credentials securely
- [ ] Share website URL with stakeholders

## Troubleshooting

If issues occur:
1. Check error logs in VistaPanel
2. Check Laravel logs in `storage/logs/laravel.log`
3. Clear all caches using clear-cache.php
4. Verify database connection in `.env`
5. Check file permissions
6. Consult INFINITYFREE_DEPLOYMENT.md guide

---

**Estimated Deployment Time:** 2-4 hours (depending on upload speed)

**Support Resources:**
- InfinityFree Forum: https://forum.infinityfree.net
- Laravel Documentation: https://laravel.com/docs
- FileZilla Guide: https://filezilla-project.org/

Good luck! 🚀

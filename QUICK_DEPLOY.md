# Quick Deploy Guide - 5 Minutes to Live!

## 🚀 Deploy to Render (Recommended)

### Step 1: Make Scripts Executable (30 seconds)
```bash
chmod +x build.sh start.sh
git add .
git commit -m "Make scripts executable"
git push origin main
```

### Step 2: Go to Render (1 minute)
1. Visit https://render.com
2. Click "Get Started for Free"
3. Sign up with GitHub

### Step 3: Create Web Service (2 minutes)
1. Click "New +" → "Web Service"
2. Select your `hotel-booking-clean` repository
3. Settings:
   - **Name:** hotel-booking
   - **Build Command:** `./build.sh`
   - **Start Command:** `./start.sh`
   - **Plan:** Free
4. Click "Create Web Service"

### Step 4: Create Database (1 minute)
1. Click "New +" → "PostgreSQL"
2. Settings:
   - **Name:** hotel-booking-db
   - **Plan:** Free
3. Click "Create Database"

### Step 5: Link Database (1 minute)
1. Go to your web service
2. Click "Environment" tab
3. Add variable:
   - **Key:** `DATABASE_URL`
   - **Value:** Copy from PostgreSQL "Internal Database URL"
4. Click "Save Changes"

### Step 6: Wait for Deploy (5 minutes)
- Render automatically builds and deploys
- Watch the logs
- Your site will be live at: `https://hotel-booking.onrender.com`

### Step 7: Test! (2 minutes)
- Visit your site
- Login to admin: `/admin/login`
- Test booking flow

**Total Time: ~10 minutes**

---

## 🎯 Deploy to Railway (Alternative)

### Step 1: Install Railway CLI (1 minute)
```bash
npm install -g @railway/cli
railway login
```

### Step 2: Create Project (1 minute)
```bash
railway init
railway link
```

### Step 3: Add MySQL (1 minute)
```bash
railway add mysql
```

### Step 4: Deploy (1 minute)
```bash
railway up
```

### Step 5: Run Migrations (1 minute)
```bash
railway run php artisan migrate --force
railway run php artisan db:seed --force
```

### Step 6: Open Site (30 seconds)
```bash
railway open
```

**Total Time: ~5 minutes**

---

## 📋 Pre-Deployment Checklist

- [ ] Code pushed to GitHub
- [ ] `build.sh` and `start.sh` are executable
- [ ] `.env` configured for production
- [ ] Database credentials ready
- [ ] Email settings configured (optional)

---

## 🔧 Quick Fixes

### Build Failed?
```bash
# Check logs in Render/Railway dashboard
# Verify build.sh has correct permissions
chmod +x build.sh start.sh
git add . && git commit -m "Fix permissions" && git push
```

### Database Error?
```bash
# Verify DATABASE_URL is set
# Check PostgreSQL service is running
# Update DB_CONNECTION=pgsql in environment
```

### 500 Error?
```bash
# Check logs
# Clear cache via shell:
php artisan config:clear
php artisan cache:clear
```

---

## 📚 Full Guides

- **Render:** See `RENDER_DEPLOYMENT.md`
- **Railway:** See `RAILWAY_DEPLOYMENT.md`
- **Comparison:** See `DEPLOYMENT_COMPARISON.md`

---

## 🆘 Need Help?

1. Check deployment logs
2. Read full deployment guide
3. Check platform documentation
4. Ask in platform Discord/Forum

---

**Fastest Option:** Render (5-10 minutes)
**Easiest Option:** Render (no CLI needed)
**Most Control:** Railway (CLI available)

Choose Render if unsure! 🎉

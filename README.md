# Laravel Hotel Booking System

A comprehensive hotel booking management system built with Laravel, featuring room management, booking system, payment integration, and customer management.

## Features

- **Room Management**: Add, edit, and manage hotel rooms with photos and amenities
- **Booking System**: Smart booking system with date-based availability
- **Payment Integration**: Support for multiple payment methods including Chapa
- **Customer Portal**: Customer registration, login, and booking management
- **Admin Dashboard**: Complete admin panel for managing all aspects of the hotel
- **Reviews & Ratings**: Customer reviews and ratings for rooms
- **Photo & Video Galleries**: Showcase hotel facilities
- **Blog System**: Post management with slug-based URLs
- **Responsive Design**: Mobile-friendly interface

## Requirements

- PHP >= 8.0
- Composer
- MySQL/MariaDB
- Node.js & NPM

## Installation

1. Clone the repository
```bash
git clone https://github.com/aklilumengesha/Laravel-Hotel-Booking.git
cd Laravel-Hotel-Booking
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations and seeders
```bash
php artisan migrate --seed
```

6. Create storage link
```bash
php artisan storage:link
```

7. Build assets
```bash
npm run dev
```

8. Start the development server
```bash
php artisan serve
```

## Default Admin Credentials

After running seeders, you can login with:
- Email: admin@admin.com
- Password: (check AdminUserSeeder)

## Tech Stack

- **Backend**: Laravel 9.x
- **Frontend**: Blade Templates, Livewire
- **Database**: MySQL
- **Payment**: Chapa Payment Gateway
- **Assets**: Laravel Mix, Bootstrap

## License

This project is open-sourced software.

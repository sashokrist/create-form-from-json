<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Form Management System

This project is a Laravel-based application designed to manage and handle forms. It allows users to submit forms and provides an admin interface to view and manage form submissions.

## Features

- **Form Submission**: Users can submit forms via dynamically generated URLs.
- **Admin Panel**: Admins can view available forms and their submissions.
- **Database Integration**: Stores form data and session information in a MariaDB database.
- **Localization**: Supports multiple locales with fallback options.
- **Logging**: Configured logging for debugging and monitoring.

## Technologies Used

- **Backend**: PHP (Laravel Framework)
- **Frontend**: Blade Templating Engine, HTML, CSS, JavaScript
- **Database**: MariaDB
- **Package Managers**: Composer (PHP), npm (JavaScript)

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <project-directory>

   Install dependencies:


composer install
npm install
Configure the .env file:


Set the database credentials (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
Update APP_URL to match your local or production environment.
Run database migrations:


php artisan migrate
Start the development server:


php artisan serve
Access the application:


User forms: http://localhost/forms/{form}
Admin panel: http://localhost/admin/forms
Routes
User Routes:


GET /forms/{form}: Display the form.
POST /forms/{form}: Submit the form.
Admin Routes:


GET /admin/forms: List all available forms.
GET /admin/forms/{form}: View submissions for a specific form.
Environment Variables
The application uses the following environment variables from the .env file:

APP_URL: Base URL of the application.
DB_*: Database connection details.
SESSION_DRIVER: Session storage driver.
MAIL_*: Mail configuration for notifications.
File Structure
routes/web.php: Defines the application routes.
resources/views: Contains Blade templates for the frontend.
app/Http/Controllers: Contains the controllers for handling requests.
app/Providers/AppServiceProvider.php: Configures application services.

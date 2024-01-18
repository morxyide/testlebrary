## About this project (Using PHP and Laravel)

This project implements a simple library management system using PHP and Laravel. The project is a part of the course at Tokyo City University. The system implements the following features:

1. User registration and login for two types of users: admin and normal user
2. Admin can add, edit, and delete materials
3. Users can borrow and return materials
4. Admin dashboard shows the total number of materials borrowed and how many overdue materials are there
5. User dashboard shows the number of materials borrowed by the user and the number of overdue materials to return.

## Setup:
1. Clone the repository
2. Create .env file - `cp .env.example .env`
3. Run `composer install`
4. Generate an app key - `php artisan key:generate`
5. Run `npm install`
6. Run `npm run dev`
7. Run `php artisan migrate`
8. Run `php artisan serve`
9. Open `localhost:8000` in your browser
10. Log in with admin "`admin@mail.com`" / "`password`" or register a user
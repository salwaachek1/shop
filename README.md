# Mini Shop 

A simple e-commerce style web application built with Laravel9 , featuring product management, user authentication and a shopping cart system.

This project demonstrates a clean separation between admin and customer roles, along with a structured and production-like approach to building a Laravel application.

---

## Features

### Authentication (Laravel Breeze)

* User registration and login
* Session based authentication
* Role based access (Admin / Customer)

### Products

* View product list (paginated)
* View product details
* Admin only:

  * Create products
  * Edit products
  * Delete products

### Cart

* Add products to cart (authenticated users)
* View cart items
* Remove items from cart
* Cart is scoped to the logged in user

### Role System

* **Admin**

  * Manage products
* **Customer**

  * Browse products
  * Add to cart

---

## Tech Stack

* Laravel 9
* Laravel Breeze (Blade)
* Bootstrap 5
* Laravel Mix (Webpack)
* MySQL (or any Laravel-supported DB)

---

## Installation

Clone the repository:

```bash
git clone https://github.com/salwaachek1/mini-shop.git
cd mini-shop
```

Install dependencies:

```bash
composer install
npm install
```

Set up environment:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database inside `.env`, then run:

```bash
php artisan migrate
```

Compile assets:

```bash
npm run dev
```

Start the server:

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## Admin Setup

To make a user admin:

```bash
php artisan tinker
```

Then run:

```php
$user = \App\Models\User::where('email', 'email@example.com')->first();
$user->role = 'admin';
$user->save();
```

---

## Project Structure Highlights

* `app/Models/Product.php` = Product model
* `app/Models/Cart.php` = Cart model
* `app/Http/Controllers/ProductController.php`
* `app/Http/Controllers/CartController.php`
* `resources/views/products/` = Product views
* `resources/views/cart/` = Cart views

---

## Notes

* Product management is restricted to admin users
* Cart functionality is only available for authenticated customers
* UI is styled using Bootstrap with custom CSS for a clean layout

---

## Future Improvements

* Product images upload (instead of URL)
* Quantity update in cart
* Checkout flow
* Order history
* Admin dashboard

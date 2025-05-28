# 🍓✨ Cool Berry – Stationery E-Commerce Website

**Cool Berry** is a sleek, modern web application designed to showcase and sell premium stationery products. Built with a user-friendly interface, it delivers an elegant shopping experience with smooth navigation, secure authentication, and dynamic content management.

---

## ✨ Features

- 🏠 Beautiful homepage with seasonal berry highlights
- 🛍️ Product browsing and filtering
- 🛒 Shopping cart and checkout functionality
- 🔐 User authentication (login/register)
- 👤 User profile and order history
- 🧑‍💼 Admin dashboard to manage products, orders, and users
- 📦 Inventory and stock tracking
- 📬 Contact form for customer inquiries
- 💳 Stripe/PayPal integration for online payments

---

## 🧑‍💼 Admin Panel
- Login/Registration with authentication middleware

- Dashboard with access control

- Manage product categories (create, edit, delete)

- Manage products (CRUD operations)

- View and manage customer orders

- Change order statuses via AJAX

- Manage user roles and delete users

- Manage contact inquiries

---

## 🛒 User Panel
- Browse products with filtering

- View product details

- Add items to cart

- Select item count while adding into the cart

- Place orders

- View order history

- Contact admin via form

- Manage profile and change password

---

## 🧰 Tech Stack

- **Backend**: Laravel
- **Frontend**: Blade Templates, HTML, CSS, Bootstrap
- **Database**: MySQL
- **Authentication**: Auth
- **Other Tools**: Laravel Jetstream, Composer, NPM, Laravel Artisan CLI, AJAX

---

## 🚀 Installation

1. **Clone the repository**
```bash
git clone https://github.com/ThoonMoeWathan/cool_berry_stationary_project
cd cool_berry_stationary_project
```

2. **Install dependencies**

```bash
composer install
npm install && npm run dev
```

3. **Environment setup**

**Copy paste "env.example" and rename it to ".env"**
```bash
php artisan key:generate
php artisan storage:link
```
4. **Configure database in .env and run migrations**

```bash
php artisan migrate --seed
```
5. **Start the development server**

```bash
php artisan serve
```

---
## 👤 User Roles

**Admin:** Full backend access (CRUD, orders, users, contacts)

**Customer:** Browse, cart, order, profile management

**Guest Users:** Can only view Home Page; must register/login to buy

---
## 📁 Project Structure
app/Http/Controllers/ – **All controller logic**

resources/views/ – **Blade view files**

routes/web.php – **Web route declarations**

database/seeders/ – **Seeder files for initial data**

public/ – **Public assets (images, styles)**

---

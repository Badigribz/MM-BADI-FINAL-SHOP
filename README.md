full-stack Laravel eCommerce demo built for the Red Giant Laravel Full Stack Intern Assessment.

---

## How to Run This Project

### 1️⃣ Clone this repository
```bash
git clone https://github.com/YOUR_USERNAME/minishop-lite.git
cd minishop-lite

### 1️⃣ run the following to install required dependencies
```bash
composer install
npm install

### 1️⃣ run the following to create a .env file
```bash
cp .env.example .env

### 1️⃣ run this
```bash
php artisan key:generate

### 1️⃣ run this to create database and seed users
```bash
php artisan migrate --seed

### 1️⃣ To start the project run these on different terminals
```bash
php artisan serve && npm run dev

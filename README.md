# 🛍️ MiniShop Lite  
*A full-stack Laravel eCommerce demo built for the **Red Giant Laravel Full Stack Intern Assessment.***

---

## 🚀 How to Run This Project

Follow these steps to set up and run the project locally.

---

### 1️⃣ Clone this repository
```bash
git clone https://github.com/moha-matano3/Mini_Shop_Lite.git
cd minishop-lite
```
### 2️⃣ run the following to Install dependencies
```bash
composer install
npm install
```
### 3️⃣ run the following to create a .env file
```bash
cp .env.example .env
```
### 1️⃣ Generate Application key
```bash
php artisan key:generate
```
### 1️⃣Run Migrations and Seed the Database
```bash
php artisan migrate --seed
```
### 1️⃣ To start the project run these on different terminals
```bash
php artisan serve && npm run dev
```

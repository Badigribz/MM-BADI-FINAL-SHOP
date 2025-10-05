full-stack Laravel eCommerce demo built for the Red Giant Laravel Full Stack Intern Assessment.

---

## 🚀 How to Run This Project

### 1️⃣ Clone this repository
```bash
git clone https://github.com/YOUR_USERNAME/minishop-lite.git
cd minishop-lite
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve && npm run dev

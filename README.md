# 🐘 AzubiTask-Pro | Backend API (Laravel)          

This is the RESTful API that powers the **AzubiTask-Pro** system. It manages the database, business logic, and secure authentication.

---

## 🔗 Project Links
* **Frontend Repository:** (https://github.com/samir4323/AzubiTask-Pro.git)

---

## 🛠️ Tech Stack & Architecture
* **Framework:** Laravel 11 (PHP 8.2+)
* **Auth:** Laravel Sanctum (Token-based)
* **Database:** MySQL (Eloquent ORM)
* **API Structure:** Standard RESTful Endpoints.

---

## 🚀 Installation & Setup

1. **Clone the repository:**
   `git clone [Link to this Repo]`

2. **Install PHP dependencies:**
   `composer install`

3. **Setup Environment:**
   `cp .env.example .env`
   `php artisan key:generate`

4. **Run Migrations:**
   `php artisan migrate`

5. **Start API Server:**
   `php artisan serve`

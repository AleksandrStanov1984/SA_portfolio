# Personal Portfolio – Aleksandr Stanov

Multilingual personal portfolio website built with **Laravel**, **TailwindCSS** and **Alpine.js**.  
Showcases real-world projects: e-commerce, CRM/ERP, DMS, provider services and .NET/C# solutions.

---

## 🌍 Languages

- 🇩🇪 Deutsch
- 🇬🇧 English
- 🇺🇦 Українська
- 🇷🇺 Русский

---

## ✨ Features

- Modern responsive layout (mobile-first)
- Projects grid with hover animations and modal previews
- Experience section with accordion
- “About me” block with a separate background section
- Dynamic reviews (stored in DB, approved flag, locale filter)
- Multilingual content (DE/EN/UA/RU)
- Built with Laravel best practices

---

## 🧰 Tech Stack

- **Backend:** Laravel 10 (PHP 8.2+)
- **Frontend:** TailwindCSS, Alpine.js
- **Database:** MySQL / MariaDB / SQLite
- **Build tools:** Vite + npm

---

## ⚙️ Requirements

- PHP >= 8.2
- Composer
- Node.js + npm
- Database (MySQL/MariaDB/SQLite)

---

## 🚀 Installation

```bash
git clone https://github.com/AleksandrStanov1984/portfolio-site.git
cd portfolio-site

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment config
cp .env.example .env

# Generate APP_KEY
php artisan key:generate

# Run migrations (if needed)
php artisan migrate

# Build assets for development
npm run dev

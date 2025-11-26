<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10+-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" />
  <img src="https://img.shields.io/badge/Alpine.js-Interactive-8BC0D0?style=for-the-badge&logo=javascript&logoColor=black" />
  <img src="https://img.shields.io/badge/Multilingual-DE%20%7C%20EN%20%7C%20RU-blue?style=for-the-badge" />
  <img src="https://img.shields.io/badge/Portfolio-Professional-success?style=for-the-badge" />
  <img src="https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge" />
  <img src="https://img.shields.io/badge/Status-Active-brightgreen?style=for-the-badge" />
</p>

<br/>

<div align="center">
  <h1>SA Portfolio Website</h1>
  <p>A modern multilingual personal portfolio built with Laravel, TailwindCSS, and Alpine.js.</p>
</div>

---

## 📌 Overview

This is a **real production-ready portfolio website**, showcasing enterprise-level projects:

- E-commerce (Shopware)
- CRM / ERP systems
- DMS workflow automation
- Internet provider tools / customer cabinet
- .NET / C# engineering solutions
- Embedded testing systems

The project demonstrates your **full-stack capabilities**, clean architecture, UI/UX skills and multilingual content organization.


---

## ✨ Features

- 🌍 **Multilingual** — DE / EN / UA / RU
- 📱 **Responsive modern UI**
- 🎨 Clean Tailwind layout with animations
- 📁 Structured pages: About, Projects, Experience, Reviews
- ⭐ **Dynamic reviews system** (DB + moderation)
- 🧩 Reusable Blade components
- 🎯 SEO-friendly structure
- 🚀 Production-ready Vite build
- 🔧 Easy to deploy (shared hosting, VPS, Docker, Laravel Forge)


---
## 🛠️ Tech Stack

| Layer | Technologies |
|-------|--------------|
| **Backend** | Laravel 10+, PHP 8.2+ |
| **Frontend** | Tailwind CSS, Alpine.js |
| **Build Tools** | Vite + npm|
| **Database** | MySQL / MariaDB / SQLite |
| **Deployment** | Nginx / Apache / Forge / Docker |
| **Features:** | Multilingual (DE/EN/RU), dynamic reviews, responsive UI|


# Personal Portfolio – Aleksandr Stanov

A modern, multilingual personal portfolio website built with **Laravel**, **Tailwind CSS** and **Alpine.js**.  
Showcases real enterprise-level projects: e-commerce (Shopware), CRM/ERP systems, DMS, provider services, .NET/C# solutions, and embedded test platforms.

This project is designed as a real-world portfolio piece to demonstrate full-stack skills (backend architecture, clean frontend, localization, and DevOps-ready structure).

---

## 🌍 Languages

- Deutsch
- English
- Русский

All main sections (About, Projects, Experience, Contacts, Reviews) are localized.

---

## ✨ Features

- Modern responsive layout (mobile-first)
- Projects grid with hover effects and modal/project detail view
- Experience section with timeline/accordion structure
- Separate "About me" block with dedicated background section
- Dynamic reviews:
    - Stored in database
    - `approved` flag
    - Locale-based filtering
- Multilingual content (DE/EN/UA/RU)
- Built with Laravel best practices (controllers, routes, views, config)
- Ready to be deployed as a professional portfolio site

---

## ⚙️ Requirements

- PHP >= 8.2
- Composer
- Node.js + npm
- Database (MySQL / MariaDB / SQLite)

---

## 🚀 Installation

```bash
git clone https://github.com/AleksandrStanov1984/SA_portfolio.git
cd SA_portfolio

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment config
cp .env.example .env

# Generate APP_KEY
php artisan key:generate

# Configure DB in .env, then (if needed) run migrations
php artisan migrate

# Build assets for development
npm run dev

npm run build
php artisan config:cache
php artisan route:cache
```
## 📁 Project Structure
```text
SA_portfolio
│
├─ app/               # Laravel application (models, controllers, etc.)
├─ bootstrap/
├─ config/
├─ database/          # Migrations, seeders (if used)
├─ public/            # Public entrypoint and assets
├─ resources/
│   ├─ views/         # Blade templates (layouts, sections, components)
│   └─ lang/          # Localization files (de/en/ua/ru)
├─ routes/            # Web & API routes
├─ scripts/           # Helper scripts (if any)
├─ storage/           # Logs, cache, compiled views
└─ tests/             # PHPUnit tests

```
## 🧪 Development notes

- TailwindCSS is integrated via Vite
- Alpine.js is used for lightweight interactivity (accordions, modals, toggles)
- Routes are organized by feature (portfolio, reviews, etc.)
- Localization keys are grouped by domain (e.g. portfolio.*, about.*)
- Code fully PSR-12 compliant

## 🎨 Screenshots (optional)
```markdown
<p align="center">
  <img src="screenshots/home.png" width="800"/>
  <img src="screenshots/projects.png" width="800"/>
</p>

```

## 🤝 Contributing

Pull requests are welcome — improvements for UI/UX, localization or new project examples are appreciated.

## 📄 License

This project is licensed under the MIT License.
Free to use for personal and commercial portfolio purposes.

## 🙋 Contact

Oleksandr Stanov
- 📧 aleksstanov84@gmail.com

- 🌍 Rottweil, Baden-Württemberg, Germany


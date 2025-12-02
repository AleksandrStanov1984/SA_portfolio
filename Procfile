web: vendor/bin/heroku-php-apache2 public/
services:
  - type: web
    name: sa-portfolio
    env: php
    repo: https://github.com/AleksandrStanov1984/SA_portfolio
    plan: free
    buildCommand: |
      composer install --no-dev --optimize-autoloader
    startCommand: |
      php artisan migrate --force && vendor/bin/heroku-php-apache2 public/
    envVars:
      - key: APP_KEY
        generateValue: true
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: false

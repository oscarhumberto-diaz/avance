#!/usr/bin/env bash
set -euo pipefail

APP_DIR="avance-web"

if [[ -d "$APP_DIR/app" ]]; then
  echo "El proyecto Laravel ya existe en $APP_DIR"
  exit 0
fi

composer create-project laravel/laravel="^12.0" "$APP_DIR"
cd "$APP_DIR"

composer require livewire/livewire
composer require laravel/breeze --dev
php artisan breeze:install livewire

php artisan storage:link || true
npm install
npm run build

sed -i "s/^APP_LOCALE=.*/APP_LOCALE=es/" .env.example
sed -i "s%^APP_FALLBACK_LOCALE=.*%APP_FALLBACK_LOCALE=es%" .env.example
sed -i "s%^APP_FAKER_LOCALE=.*%APP_FAKER_LOCALE=es_ES%" .env.example
sed -i "s%^APP_TIMEZONE=.*%APP_TIMEZONE=America\/El_Salvador%" .env.example

cat >> .env.example <<'ENVEXTRA'

# --- Base de datos MySQL (5.7+) ---
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=avance_web
DB_USERNAME=root
DB_PASSWORD=

# Charset/collation para tildes y emojis
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci
ENVEXTRA

php artisan key:generate

echo "Proyecto creado. Configura .env y ejecuta: php artisan migrate"

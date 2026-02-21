# avance-web

Aplicación Laravel 12 para AVANCE, con rutas públicas, panel administrativo y pruebas de humo.

## Requisitos locales

- PHP 8.2+
- Composer 2+
- Node.js 20+
- MySQL 8+ (recomendado) con `utf8mb4`

## Levantar el proyecto en local

1. Instalar dependencias PHP:

   ```bash
   cd avance-web
   composer install
   ```

2. Configurar entorno:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Configurar base de datos MySQL en `.env` usando `utf8mb4`.

4. Ejecutar migraciones y seeders:

   ```bash
   php artisan migrate --seed
   ```

5. Instalar dependencias frontend y compilar assets:

   ```bash
   npm ci
   npm run build
   ```

6. Ejecutar servidor local:

   ```bash
   php artisan serve
   ```

## Ejecutar pruebas

```bash
php artisan test
```

## CI (GitHub Actions)

El workflow `/.github/workflows/ci.yml` ejecuta, en este orden:

1. `composer install`
2. `php artisan test`
3. `npm ci`
4. `npm run build`

Para pruebas, CI levanta un servicio MySQL (`mysql:8.0`) y configura la app para usar esa base de datos durante la ejecución.

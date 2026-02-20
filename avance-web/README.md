# avance-web (Laravel 12 + Livewire)

Este repositorio no pudo descargar dependencias desde Packagist en este entorno CI (proxy con `403`), por lo que se incluye un bootstrap reproducible para generarlo localmente con Internet.

## Requisitos

- PHP 8.4
- Composer 2.8+
- Node.js 20+
- MySQL 5.7+

## Crear el proyecto

Desde la raíz del repo:

```bash
bash avance-web/scripts/bootstrap.sh
```

Este script:

- crea `avance-web/` con Laravel 12,
- instala Livewire,
- instala el starter kit oficial de auth (`laravel/breeze`) con stack Livewire,
- compila assets con Tailwind,
- ajusta locale/timezone a español y `America/El_Salvador`,
- define variables MySQL y charset `utf8mb4`.

## Configuración local (manual)

1. Entrar al proyecto:

   ```bash
   cd avance-web
   ```

2. Copiar entorno:

   ```bash
   cp .env.example .env
   ```

3. Ajustar credenciales MySQL en `.env`.

4. Crear la base de datos con UTF-8 completo:

   ```sql
   CREATE DATABASE avance_web CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

5. Migrar:

   ```bash
   php artisan migrate
   ```

6. Levantar app:

   ```bash
   php artisan serve
   ```

## Verificaciones esperadas

- `php artisan migrate` ejecuta correctamente en MySQL 5.7+.
- Login/logout disponibles por Breeze + Livewire.
- `/` muestra `AVANCE` (asegurar encoding UTF-8 en editor/terminal/browser).

## Notas de encoding

- En MySQL usar siempre `utf8mb4` y `utf8mb4_unicode_ci`.
- En Laravel, mantener `DB_CHARSET=utf8mb4` y `DB_COLLATION=utf8mb4_unicode_ci`.
- Guardar archivos Blade/PHP en UTF-8 sin BOM.

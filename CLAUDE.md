# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

**Setup (first time):**
```bash
composer run setup
```
This installs dependencies, copies `.env.example` to `.env`, generates an app key, runs migrations, and builds frontend assets.

**Development (runs all services concurrently):**
```bash
composer run dev
```
Starts: Laravel dev server, queue worker, Pail log viewer, and Vite dev server.

**Run all tests:**
```bash
composer run test
# or
php artisan test
```

**Run a single test file or filter:**
```bash
php artisan test tests/Feature/ExampleTest.php
php artisan test --filter ExampleTest
```

**Linting (Laravel Pint):**
```bash
./vendor/bin/pint
# Check without fixing:
./vendor/bin/pint --test
```

**Frontend build:**
```bash
npm run build   # production
npm run dev     # watch mode (already included in composer run dev)
```

**Database migrations:**
```bash
php artisan migrate
php artisan migrate:fresh --seed
```

## Architecture

**Mourid Connect** is a multi-vendor marketplace for African artisanal and local products, targeting Senegal (currency: FCFA, default country code: SN). Sellers create shops and list products; buyers browse and contact sellers.

### Stack

- **PHP 8.3+**, Laravel 13, MySQL (production) / SQLite (tests)
- **Vite** + `laravel-vite-plugin`; entry points are `resources/css/app.css` and `resources/js/app.js`
- **Tailwind CSS v4** via `@tailwindcss/vite` — no separate config file
- **Blade** templates in `resources/views/`
- **Laravel Sanctum** — token-based API auth (configured, not yet wired to routes)
- **Spatie Laravel Permission** — role/permission system
- **Intervention Image v4** — image processing for product/shop media
- **Maatwebsite Excel** — import/export
- **Cocur Slugify** — URL slug generation

### Data Model

The full schema lives in `database/migrations/`. Key relationships:

- **Users** → **Shops** (one-to-many): a user can own multiple shops
- **Shops** → **Products** (one-to-many): products belong to a shop
- **Categories** → self (hierarchical via `parent_id`) and → **Products**
- **Products** → **ProductImages** (one-to-many, with `is_main` flag and `order` column)
- **Users** → **Reviews** → **Products** (unique per user/product pair; has `is_verified_purchase` flag)

**Shop tiers:** `basic`, `pro`, `premium` — the `shops` table has `tier` and `max_products` columns to enforce limits.

**Analytics:** `shops` and `products` each have `views_count` and `contacts_count` integer columns for lightweight tracking.

### Implementation State

The database schema is fully defined in migrations. Eloquent models beyond `User` and controllers beyond the base `Controller.php` do not yet exist — they need to be built out. Routes are minimal (`routes/web.php` has only the welcome route).

### Routes & Tests

Routes: `routes/web.php` (HTTP), `routes/console.php` (Artisan). No API routes yet.

Tests split into `tests/Unit/` and `tests/Feature/`; test environment configured in `phpunit.xml` (uses in-memory SQLite).

# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Structure du projet

```
/Users/montage/mourid-connect/
├── backend/    ← Laravel 13 (ce dossier)
└── frontend/   ← Angular 21
```

## Commandes backend (depuis /backend)

```bash
php artisan serve --port=8080   # démarrer l'API
php artisan migrate:fresh --seed  # reset + seed complet
php artisan test                  # tests
./vendor/bin/pint                 # lint
```

## Commandes frontend (depuis /frontend)

```bash
npm start         # ng serve (port 4200)
npm run build     # build production
```

## Architecture

**Mourid Connect** — réseau social et marketplace de la communauté mouride mondiale.

### Stack backend

- **PHP 8.3+**, Laravel 13, MySQL (prod) / SQLite (tests)
- **Laravel Sanctum** — auth par Bearer token
- **Spatie Laravel Permission** — rôles `vendor` / `admin` (désactivés en dev, à réactiver en prod)
- **Intervention Image v4** — resize + thumbnails
- **Cocur Slugify** — génération de slugs
- **CurrencyService** — conversion FCFA ↔ EUR (taux fixe 655.957)

### Modèles et relations

- `User` → `Shop` (one-to-many) — un user peut avoir plusieurs boutiques
- `Shop` → `Product` (one-to-many)
- `Category` → self (hiérarchique via `parent_id`) → `Product`
- `Product` → `ProductImage` (one-to-many, `is_main` flag)
- `User` → `Review` → `Product` (unique par paire user/produit)

**Route model binding :** `Product` et `Shop` se résolvent par `slug` (via `getRouteKeyName()`).

**Shop tiers :** `basic` (max 10 produits), `pro`, `premium` — enforced via `Shop::canAddProduct()`.

### Routes API (`routes/api.php`)

Endpoints publics : `GET /api/categories`, `GET /api/shops`, `GET /api/shops/{slug}`, `GET /api/products`, `GET /api/products/{slug}`, `GET /api/products/{slug}/reviews`

Filtre produits : `?page=`, `?per_page=` (max 100), `?search=`, `?category=` (id), `?parent_category=` (id parent), `?shop=` (id), `?featured=1`

Endpoints auth : `POST /api/auth/register`, `POST /api/auth/login`

Endpoints protégés (`auth:sanctum`) : CRUD shops/products/reviews, vendor dashboard, admin.

### Seeders

`php artisan migrate:fresh --seed` exécute dans l'ordre :
1. `RoleSeeder` — rôles vendor/admin + permissions
2. `CategorySeeder` — 10 catégories parentes + 43 sous-catégories
3. Admin user (`admin@mourid.com` / `password`)
4. Vendor user (`vendor@mourid.com` / `password`)
5. `UserSeeder` — 50 users (noms sénégalais)
6. `ShopSeeder` — 50 boutiques
7. `ProductSeeder` — 50 produits + images picsum.photos
8. `ReviewSeeder` — 50 avis

### Tests

```bash
php artisan test tests/Feature/ExampleTest.php
php artisan test --filter NomDuTest
```

Environnement test : SQLite in-memory (`phpunit.xml`).

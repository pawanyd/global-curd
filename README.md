# Global CRUD Package

A Laravel package that provides a **single controller** (`GlobalController`) to handle **CRUD** operations for **multiple models**, with **dynamic** form generation and **dynamic** index listings.

## Features

- **Single GlobalController** to handle all CRUD routes.
- **Dynamic form fields** based on each model’s database table schema.
- **Dynamic listing** in the index view with column introspection.
- **Pagination** included.
- Automatic success messages for create, update, and delete.

## Requirements

- **PHP** >= 8.0
- **Laravel** >= 10.x (compatible with 11.x as well)

## Installation

1. **Require the package** via Composer:

    ```bash
    composer require pawanyd/global-crud:dev-main
    ```

2. **Publish stubs** (controller & blade views) by running the Artisan command:

    ```bash
    php artisan global-crud:install
    ```

   This copies:
   - `GlobalController.php` → `app/Http/Controllers/GlobalController.php`
   - `index.blade.php` → `resources/views/index.blade.php`
   - `create.blade.php` → `resources/views/create.blade.php`
   - `edit.blade.php` → `resources/views/edit.blade.php`

   You can also publish them manually:

   ```bash
   php artisan vendor:publish --tag=global-crud-stubs

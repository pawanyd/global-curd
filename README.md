# Global CRUD Package

A Laravel package that provides a **single controller** (`GlobalController`) to handle **CRUD** operations for **multiple models**, using **dynamic** form generation and **dynamic** index listings. This setup significantly reduces boilerplate when building CRUD features for different entities.

# Features

- **Single GlobalController** for all CRUD routes
- **Dynamic form fields** using database schema introspection
- **Automatic listing** of columns in the index view
- **Pagination** for large datasets
- **Success messages** on create, update, and delete
- Supports **Tailwind** or any CSS framework for easy styling

# Requirements

- **PHP** >= 8.0
- **Laravel** >= 10.x (compatible with 11.x as well)

Ensure you have a functional Laravel project with database connectivity set up before installing this package.

# Installation

1. **Install via Composer**  
   ```bash
   composer require pawanyd/global-crud:dev-main
   
2. **Publish the stubs**
   ```bash
   php artisan global-crud:install

   or

   php artisan vendor:publish --tag=global-crud-stubs

These commands will copy:

- GlobalController.php into app/Http/Controllers
- index.blade.php, create.blade.php, edit.blade.php into resources/views


---

# Configuration

## 1. Add Routes

In `routes/web.php`:
```php
use App\Http\Controllers\GlobalController;

Route::get('/{model}', [GlobalController::class, 'index'])->name('global.index');
Route::get('/{model}/create', [GlobalController::class, 'create'])->name('global.create');
Route::post('/{model}', [GlobalController::class, 'store'])->name('global.store');
Route::get('/{model}/{id}', [GlobalController::class, 'show'])->name('global.show');
Route::get('/{model}/{id}/edit', [GlobalController::class, 'edit'])->name('global.edit');
Route::put('/{model}/{id}', [GlobalController::class, 'update'])->name('global.update');
Route::delete('/{model}/{id}', [GlobalController::class, 'destroy'])->name('global.destroy');
```

You can prefix these routes (e.g., /admin/{model}) to avoid collisions with other routes.

## 2. Verify the Published Files

- app/Http/Controllers/GlobalController.php
- resources/views/global-curd/index.blade.php
- resources/views/global-curd/create.blade.php
- resources/views/global-curd/edit.blade.php
``


---

# Usage

## 1. Creating Models

```bash
php artisan make:model ModelName
```

Create Eloquent models (e.g., `User`, `Post`, `Product`) in `app/Models`.  
No need to define `$fillable` if using `forceFill()`.

## 2. Access the Global CRUD

- **Index**: `GET /{model}`  
- **Create**: `GET /{model}/create`  
- **Store**: `POST /{model}`  
- **Edit**: `GET /{model}/{id}/edit`  
- **Update**: `PUT /{model}/{id}`  
- **Destroy**: `DELETE /{model}/{id}`

For instance, `GET /user` lists `User` records; `GET /user/create` opens the create form.

## 3. Dynamic Fields

The table schema is introspected:
- `varchar/text` → text input
- `tinyint(1)` → checkbox
- `enum` → select dropdown
- `date` → date input
- `int` → number input

## 4. Pagination

By default, `GlobalController` uses:
```php
$items = $modelClass::paginate(10);
```
Adjust the 10 as needed. Blade uses {{ $items->links() }} for pagination links.



---

# Troubleshooting

1. **Class Not Found**  
   - Ensure your namespace in `src/GlobalCrudServiceProvider.php` matches `composer.json` PSR-4.

2. **MassAssignmentException**  
   - The stubs use `forceFill()` to bypass `$fillable`. Removing it requires `$fillable` or `Model::unguard()`.

3. **Publishing Issues**  
   - If `php artisan global-crud:install` does nothing, try:
     ```bash
     php artisan vendor:publish --tag=global-crud-stubs --force
     ```
   - Verify stubs are copied to `app/Http/Controllers` and `resources/views`.
   

# Contributing

1. **Fork** this repository.  
2. **Create a feature branch** for your changes.  
3. **Commit** and **push** your changes.  
4. Open a **Pull Request** describing your modifications.

Your contributions, bug reports, and feature requests are always welcome!


# License

This package is released under the [MIT License](LICENSE).

You are free to use, modify, and distribute this package in both commercial and personal projects as permitted by the MIT license.

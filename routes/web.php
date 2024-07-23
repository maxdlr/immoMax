<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Admin ---------------------------------------------------------------------------------------------------------------
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin_dashboard');

// Lodging -------------------------------------
makeAdminCrudRoutes(LodgingController::class, 'lodging',
    ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']
);

// User -------------------------------------
makeAdminCrudRoutes(UserController::class, 'user',
    ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']
);

// Public ---------------------------------------------------------------------------------------------------------------

// Lodging -------------------------------------
makePublicRoutes(LodgingController::class, 'lodging',
    ['index', 'show']
);

// Route Factory --------------------------------------------------------------------------------------------------------

function makeAdminCrudRoutes(string $controllerFqcn, string $model, array $routes): void
{
    foreach ($routes as $route) {
        $methods = match ($route) {
            'index', 'create', 'edit', 'update' => ['GET', 'POST'],
            'store' => ['POST'],
            'destroy' => ['DELETE'],
            default => ['GET']
        };

        $uriSuffix = match ($route) {
            'edit', 'update', 'destroy', 'show' => '/{' . $model . '}',
            default => ''
        };

        $method = 'admin' . ucfirst($route);

        Route::match($methods, "/admin/$model/$route" . $uriSuffix, [$controllerFqcn, $method])->name('admin_' . $model . '_' . $route);
    }
}


function makePublicRoutes(string $controllerFqcn, string $model, array $routes): void
{
    foreach ($routes as $route) {
        $methods = match ($route) {
            'index' => ['GET', 'POST'],
            default => ['GET']
        };

        $uriSuffix = match ($route) {
            'show' => '/{' . $model . '}',
            default => ''
        };

        Route::match($methods, "/$model/$route" . $uriSuffix, [$controllerFqcn, $route])->name($model . '_' . $route);
    }
}

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\LodgingTypeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Admin ---------------------------------------------------------------------------------------------------------------
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin_dashboard');

// Lodging -----------------------------------------
makeAdminCrudRoutes(LodgingController::class, 'lodging',
    ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']
);

// LodgingType -------------------------------------
makeAdminCrudRoutes(LodgingTypeController::class, 'lodgingType',
    ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']
);

// User --------------------------------------------
makeAdminCrudRoutes(UserController::class, 'user',
    ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']
);

// User --------------------------------------------
makeAdminCrudRoutes(MediaController::class, 'media',
    ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy']
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Public ---------------------------------------------------------------------------------------------------------------
Route::get('/', [HomeController::class, 'home'])->name('app_home');
Route::match(['GET', 'POST'], '/filtered', [HomeController::class, 'filter'])->name('lodging_filter');


// Lodging ------------------------------------------
makePublicRoutes(LodgingController::class, 'lodging',
    ['show']
);

// Route Factory --------------------------------------------------------------------------------------------------------

function makeAdminCrudRoutes(string $controllerFqcn, string $model, array $routes): void
{
    foreach ($routes as $route) {
        $methods = match ($route) {
            'index', 'create', 'edit' => ['GET', 'POST', 'PUT'],
            'update' => ['PUT'],
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

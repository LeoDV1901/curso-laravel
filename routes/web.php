<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\YourController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAccessToProductos;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\RedirigirCorreoMiddleware;


Route::middleware(['auth'])->get('/index', function () {
    return view('index');
})->name('index');


Route::get('/', function () {
    return view('login');
});

Route::get('/productos', function () {
    return view('producto');
})->middleware(CheckAccessToProductos::class);

Route::post('/store-data', [YourController::class, 'store'])->name('store.data');

Route::get('/profile', function () {
    
})->middleware(CheckAge::class);

Route::get('/form', function () {
    return view('form');  
});

Route::get('/gorda', function () {
    return view('gorda');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::resource('/post', PostController::class);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([CheckAccessToProductos::class])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');       
Route::get('ventas/create', [VentaController::class, 'create'])->name('ventas.create'); 
Route::post('ventas', [VentaController::class, 'store'])->name('ventas.store');       
Route::get('ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show'); 
Route::get('ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit'); 
Route::put('ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
Route::delete('ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy'); 

Route::get('/index_cruds', function () {
    return view('index_cruds'); 
})->name('index_cruds');

Route::get('/index', function () {
    return view('index'); 
})->name('index');

});

Route::middleware(['auth', RedirigirCorreoMiddleware::class])->group(function () {
    Route::get('/Index', [IndexController::class, 'index'])->name('index');
 
    Route::get('/index-cruds', [IndexController::class, 'indexCruds'])->name('index_cruds');
});


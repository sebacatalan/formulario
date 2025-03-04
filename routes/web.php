<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GraficasController;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Rutas protegidas con autenticación
Route::middleware(['auth'])->group(function () {

    // 📌 Ruta accesible para ambos roles (admin y usuario)
    Route::get('/formulario', [FormularioController::class, 'index'])->name('formulario.index');
    Route::post('/guardar', [FormularioController::class, 'guardar'])->name('guardar');

    // 📌 Solo admin puede ver gráficos y descargar CSV
    Route::middleware('role:admin')->group(function () {
        Route::get('/grafica', [GraficasController::class, 'mostrarGrafica'])->name('grafica');
        Route::get('/descargar-csv', [ExportController::class, 'descargarCSV'])->name('descargar.csv');
    });

    // Cierre de sesión disponible para cualquier usuario autenticado
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

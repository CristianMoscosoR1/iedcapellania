<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController; // Asegúrate de importar tu controlador
//use App\Http\Controllers\ProgramController; // Asegúrate de importar el controlador de programas
use App\Http\Controllers\CommentController; // Asegúrate de importar el controlador
use Illuminate\Support\Facades\Route;
use App\Models\Comment; // Add this if you have a Comment model
use App\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('layouts.home');  
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Resistro de usuarios

// Rutas de usuarios (con autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Mostrar usuarios
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Crear nuevo usuario
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Editar usuario
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Actualizar usuario
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Eliminar usuario
});

// Rutas para editar perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas protegidas por rol 'admin'
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Ruta para gestionar usuarios (solo accesible para admin)
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios');
    // Otras rutas para admin pueden ir aquí...
});

// Rutas protegidas por el rol 'editor' o 'admin'
//Route::middleware(['auth', 'role:editor|admin'])->group(function () {
    // Ruta para editar programas (solo accesible para editores o admin)
    //Route::get('/programas/editar', [ProgramController::class, 'edit'])->name('programas.edit');
    // Otras rutas para editor o admin pueden ir aquí...
//});

// Rutas protegidas por el permiso 'gestionar usuarios'
Route::middleware(['auth', 'can:gestionar usuarios'])->group(function () {
    // Ruta para gestionar usuarios (solo accesible para los que tienen el permiso)
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
});

// Ruta publica radio
Route::get('/radio', function () {
    // If you have a Comment model and table, use:
    // $comments = Comment::latest()->get();
    $comments = []; // Temporary fix, replace with actual comments later
    return view('radio.index', compact('comments'));
})->name('radio');


require __DIR__.'/auth.php';

// Ruta para guardar comentarios
Route::middleware(['auth', 'role:profesor'])->group(function () {
    Route::put('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::put('/comments/{comment}/hide', [CommentController::class, 'hide'])->name('comments.hide');
});
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

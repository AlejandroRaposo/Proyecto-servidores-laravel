<?php

use App\Http\Controllers\novelaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para crear la vista de inserción de datos
Route::get('/novelas/create', novelaController::class . '@create')->middleware(['auth', 'verified'])->name('novelas.create');

Route::get('/novelas', novelaController::class . '@index')->middleware(['auth', 'verified'])->name('novelas.index');

// Guarda en bd los datos
Route::post('/novelas', novelaController::class . '@store')->middleware(['auth', 'verified'])->name('novelas.store');

// Ruta para que muestre los datos de una novela
Route::get('/novelas/show/{id}', novelaController::class . '@show')->middleware(['auth', 'verified'])->name('novelas.show');

Route::get('/novelas/autor/{id}', novelaController::class . '@showNovelasAutor')->middleware(['auth', 'verified'])->name('novelas.autor');

// Ruta que con el id de novela carga los datos y se los pasa al formulario de edición
Route::get('/novelas/edit/{id}', novelaController::class . '@edit')->middleware(['auth', 'verified'])->name('novelas.edit');

// Ruta que guarda datos en la bd
Route::put('/novelas/update/{id}', novelaController::class . '@update')->middleware(['auth', 'verified'])->name('novelas.update');

// Ruta que elimina la novela con el id que recibimos
Route::delete('/novelas/{id}', novelaController::class . '@destroy')->middleware(['auth', 'verified'])->name('novelas.destroy');


require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '/bibliotecarios'], function() {
    Route::get('/', [App\Http\Controllers\BibliotecarioController::class, 'index'])->name('bibliotecarios.index');
    Route::get('/create', [App\Http\Controllers\BibliotecarioController::class, 'create'])->name('bibliotecarios.create');
    Route::post('/', [App\Http\Controllers\BibliotecarioController::class, 'store'])->name('bibliotecarios.store');
    Route::get('/{bibliotecario}', [App\Http\Controllers\BibliotecarioController::class, 'show'])->name('bibliotecarios.show');
    Route::get('/{bibliotecario}/edit', [App\Http\Controllers\BibliotecarioController::class, 'edit'])->name('bibliotecarios.edit');
    Route::put('/{bibliotecario}', [App\Http\Controllers\BibliotecarioController::class, 'update'])->name('bibliotecarios.update');
    Route::delete('/{bibliotecario}', [App\Http\Controllers\BibliotecarioController::class, 'destroy'])->name('bibliotecarios.destroy');
});

Route::group(['prefix' => '/estudiantes'], function() {
    Route::get('/', [App\Http\Controllers\EstudianteController::class, 'index'])->name('estudiantes.index');
    Route::get('/create', [App\Http\Controllers\EstudianteController::class, 'create'])->name('estudiantes.create');
    Route::post('/', [App\Http\Controllers\EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::get('/{estudiante}', [App\Http\Controllers\EstudianteController::class, 'show'])->name('estudiantes.show');
    Route::get('/{estudiante}/edit', [App\Http\Controllers\EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::put('/{estudiante}', [App\Http\Controllers\EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('/{estudiante}', [App\Http\Controllers\EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
});

Route::group(['prefix' => '/libros'], function() {
    Route::get('/', [App\Http\Controllers\LibroController::class, 'index'])->name('libros.index');
    Route::get('/create', [App\Http\Controllers\LibroController::class, 'create'])->name('libros.create');
    Route::post('/', [App\Http\Controllers\LibroController::class, 'store'])->name('libros.store');
    Route::get('/{libro}', [App\Http\Controllers\LibroController::class, 'show'])->name('libros.show');
    Route::get('/{libro}/edit', [App\Http\Controllers\LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/{libro}', [App\Http\Controllers\LibroController::class, 'update'])->name('libros.update');
    Route::delete('/{libro}', [App\Http\Controllers\LibroController::class, 'destroy'])->name('libros.destroy');
});
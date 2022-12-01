<?php

use App\Http\Controllers\postController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [postController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/addpost', [postController::class, 'addpost'])->middleware(['auth'])->name('addpost');

Route::post('/store/post', [postController::class, 'storepost'])->name('storepost');

Route::get('/delete/post/{id}', [postController::class, 'deletepost'])->name('deletepost');

Route::get('/edit/post/{id}', [postController::class, 'editpost'])->middleware(['auth'])->name('editpost');

Route::post('/update/post/{id}', [postController::class, 'updatepost'])->name('updatepost');

require __DIR__.'/auth.php';

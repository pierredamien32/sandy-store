<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AdminController;

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
    return view('articles');
});

Route::get('/admin/mes-articles', function () {
    return view('admin/homeAdmin');
});

Route::get('/super@dmin/mr-top', function () {
    return view('superAdmin/homeSuperAdmin');
});
Route::get('/login', [AdminController::class, 'createFormLogin'])->name('createFormLogin');
Route::post('/login', [AdminController::class, 'loginUsers'])->name('loginUsers');

// Route accessible que si l'utilisateur est connecté
Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/admin/addArticle', [ArticleController::class, 'create'])->name('addArticle.create');
    Route::get('/admin/home', [AdminController::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('/super@dmin/mr-top', [AdminController::class, 'homeSuperAdmin'])->name('homeSuperAdmin');
    Route::get('/super@dmin/add-admin', [AdminController::class, 'create'])->name('addAdmin.create');
    Route::post('/super@dmin/add-admin', [AdminController::class, 'store'])->name('addAdmin.store');
    Route::post('/logout', [Admincontroller::class, 'logout']);
});



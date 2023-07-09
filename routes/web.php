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

// Route::get('/', function () {
//     return view('articles');
// });

Route::get('/admin/mes-articles', function () {
    return view('admin/homeAdmin');
});

// Route::get('/super@dmin/mr-top', function () {
//     return view('superAdmin/homeSuperAdmin');
// });
Route::get('/', [ArticleController::class, 'article'])->name('all.article');
Route::get('/login', [AdminController::class, 'createFormLogin'])->name('createFormLogin');
Route::post('/login', [AdminController::class, 'loginUsers'])->name('loginUsers');

// Route accessible que si l'utilisateur est connecté
Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('/mes_articles', [ArticleController::class, 'mes_articles'])->name('mes_articles');
    Route::get('/admin/addArticle', [ArticleController::class, 'create'])->name('addArticle.create');
    Route::post('/admin/addArticle', [ArticleController::class, 'store'])->name('addArticle.store');
    Route::get('/admin/home', [ArticleController::class, 'index'])->name('homeAdmin.index');
    Route::get('/admin/edit_produit/{id}', [ArticleController::class, 'edit'])->name('homeAdmin.edit');
    Route::get('/admin/show_produit/{id}', [ArticleController::class, 'show'])->name('homeAdmin.show');
    Route::post('/admin/update_produit/{id}', [ArticleController::class, 'update'])->name('homeAdmin.update');
    Route::post('/admin/update_produit/{id}', [ArticleController::class, 'update'])->name('homeAdmin.update');
    Route::delete('/admin/delete_produit/{id}', [ArticleController::class, 'destroy'])->name('homeAdmin.destroy');

    Route::get('/super@dmin/mr-top', [AdminController::class, 'homeSuperAdmin'])->name('homeSuperAdmin');
    Route::get('/super@dmin/add-admin', [AdminController::class, 'create'])->name('addAdmin.create');
    Route::post('/super@dmin/add-admin', [AdminController::class, 'store'])->name('addAdmin.store');
    Route::post('/logout', [Admincontroller::class, 'logout'])->name('logout');
});



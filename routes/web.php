<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BasketController;

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCategoryController;


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
Route::post('basket/add/{id}', [BasketController::class, 'add'])->name('basket.add');
Route::group(['middleware' => 'basket.empty'], function() {
    Route::get('basket', [BasketController::class, 'index'])->name('basket');
    Route::get('basket/place', [BasketController::class, 'place'])->name('basket.place');

    Route::post('basket/remove/{id}', [BasketController::class, 'remove'])->name('basket.remove');
    Route::post('basket/confirm', [BasketController::class, 'confirm'])->name('basket.confirm');
});


Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/{categoryid}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('posts/{postid}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{postid}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/', [PostController::class, 'store'])->name('posts.store');

Route::group(['middleware' => 'admin'], function() {
Route::get('admin/posts', [AdminPostController::class, 'index'])->name('admin.posts')->middleware('admin');
Route::get('admin/orders', [AdminPostController::class, 'orders'])->name('admin.orders')->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::post('admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::post('admin/posts/{postid}/update', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::get('admin/posts/{postid}', [AdminPostController::class, 'show'])->name('admin.posts.show');
Route::get('admin/posts/{postid}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::get('admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
Route::get('admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories');
Route::get('admin/categories/{categoryid}', [AdminCategoryController::class, 'show'])->name('admin.categories.show');
Route::get('admin/categories/{categoryid}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
Route::post('admin/categories/{category}/update', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('admin/categories{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

});




Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

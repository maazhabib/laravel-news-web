<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\post\PostController;
use App\Http\Controllers\Website\WebsiteController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('/user', UserController::class);
Route::get('/delete/{user}' , [UserController::class , 'delete'])->name('delete.user');

Route::resource('/categories', CategoriesController::class);
Route::get('/categories/delete/{categories}', [CategoriesController::class, 'delete'])->name('categories.delete');

Route::resource('/post', PostController::class);
Route::get('/post/delete/{post}', [PostController::class, 'delete'])->name('post.delete');

Route::resource('/news-web', WebsiteController::class);
<<<<<<< HEAD
=======
// sidebar
Route::get('/sidebar', [WebsiteController::class, 'sidebar'])->name('website.sidebar');

>>>>>>> 03ec7845ace75859c66183742404d4852c5e0573

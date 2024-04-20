<?php
// Within your RouteServiceProvider or routes/web.php file

use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
// Routes that require authentication
    Route::get('/dashboard', function () {
        return redirect('post');
    })->name('dashboard');

    Route::resource('/user', UserController::class);
    Route::get('/delete/{user}', [UserController::class, 'delete'])->name('delete.user');

    Route::resource('/categories', CategoriesController::class);
    Route::get('/categories/delete/{categories}', [CategoriesController::class, 'delete'])->name('categories.delete');

    Route::resource('/post', PostController::class);
    Route::get('/post/delete/{post}', [PostController::class, 'delete'])->name('post.delete');
});

require __DIR__.'/auth.php';

// Routes that do not require authentication
Route::resource('/news-web', WebsiteController::class);

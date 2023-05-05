<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\NewsCategoryIndex;
use App\Http\Livewire\NewsCategoryForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;

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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'category'], function () {
       Route::get('index', NewsCategoryIndex::class)->name('news-category-index');
       Route::get('{id}', NewsCategoryForm::class)->name('news-category-form');
    });

    Route::resource('category', CategoriesController::class);
    Route::resource('news', NewsController::class);
});

require __DIR__.'/auth.php';

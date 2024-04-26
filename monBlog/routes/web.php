<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\CategorieController;


$idRegex = '[0-9]+';
$slugRegex = '[0-9A-z\-]+';

Route::get('/', [PostController::class, 'index'])->name('blog.post');
Route::get('/blog/{categorie}', [PostController::class, 'indexCat'])->name('blog.postCat');
Route::get('/blog/search/author', [PostController::class, 'indexAuth'])->name('blog.postAuth');
Route::get('/blog/article/{slug}-{post}', [PostController::class, 'show'])->name('blog.single')->where([
    'slug'=>$slugRegex,
    'post'=> $idRegex,
]);
Route::post('/blog/{slug}-{post}/commenter', [PostController::class, 'commenter'])->name('comment')->where([
    'slug'=>$slugRegex,
    'post'=> $idRegex,
]);


Route::get('/dashboard/edit/{post}', [DashboardController::class, 'edit'])->name('editpost')->middleware(['auth', 'verified']);;
Route::get('dashboard/create', [DashboardController::class, 'create'])->name('create')->middleware(['auth', 'verified']);;
Route::post('dashboard/create', [DashboardController::class, 'store'])->name('store')->middleware(['auth', 'verified']);;
Route::post('/dashboard/update/{post}', [DashboardController::class, 'update'])->name('updatepost')->middleware(['auth', 'verified']);
Route::post('/dashboard/delete/{post}', [DashboardController::class, 'delete'])->name('deletepost')->middleware(['auth', 'verified']);


Route::post('dashboard/create/categorie', [CategorieController::class, 'save'])->name('save')->middleware(['auth', 'verified']);;
Route::get('dashboard/create/categorie', [CategorieController::class, 'new'])->name('new')->middleware(['auth', 'verified']);;
Route::post('/dashboard/dell/{categorie}', [CategorieController::class, 'dell'])->name('deletecategorie')->middleware(['auth', 'verified']);
Route::get('/dashboard/categorie', [CategorieController::class, 'show'])->name('show')->middleware(['auth', 'verified']);



//Route::prefix('/blog')->controller(PostController::class)->group(function (){
//    Route::get('',  'index')->name('post');
//    Route::get('/create',  'create')->name('create');
//    Route::post('/create',  'store')->name('store');
//
//
//});


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/management', [DashboardController::class, 'gestion'])->middleware(['auth', 'verified'])->name('management');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

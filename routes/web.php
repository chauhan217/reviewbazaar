<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\ReviewController; 



require __DIR__.'/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');
Route::post('/signup', [LoginController::class, 'register'])->name('register');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/user-profile', [HomeController::class, 'userProfile'])->name('user.profile');
    Route::get('/change-password', [HomeController::class, 'userChangePassword'])->name('user.profile.password');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/updatePassword', [HomeController::class, 'updateProfilePassword'])->name('profile.update.password');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('user.blogs');
    Route::get('/blogs/add', [HomeController::class, 'addBlogs'])->name('user.blogs.add');
    Route::get('/user-review', [HomeController::class, 'userReview'])->name('user.review');
    Route::get('/user-business', [HomeController::class, 'userBusiness'])->name('user.business');
    Route::post('/add-blog', [HomeController::class, 'storeUserBlog'])->name('profile.blog.store');
    Route::get('/blogs/edit/{id}', [HomeController::class, 'editBlog'])->name('user.blogs.edit');
    Route::post('/update-blog/{id}', [HomeController::class, 'updateUserBlog'])->name('profile.blog.update');
    Route::get('/user-business/add', [HomeController::class, 'userBusinessAdd'])->name('user.business.add');
    Route::post('/add-business', [HomeController::class, 'storeUserbusiness'])->name('profile.business.store');
    Route::get('/business/edit/{id}', [HomeController::class, 'editBusiness'])->name('user.business.edit');
    Route::post('/business/update/{id}', [HomeController::class, 'updateUserbusiness'])->name('profile.business.update');
});

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/latest-reviews', [HomeController::class, 'reviewList'])->name('review-list');
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/sub-category/{slug}', [HomeController::class, 'subCategory'])->name('sub-category');
Route::get('/review/{slug}', [ReviewController::class, 'review'])->name('review');
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-details');
Route::get('/categories/{slug}', [CategoryController::class, 'show']);
Route::get('/company/{website_url}', [CompanyController::class, 'show']);
Route::get('/company-review', [CompanyController::class, 'review'])->name('company.review');




Route::get('/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/{slug}', [HomeController::class, 'page']);
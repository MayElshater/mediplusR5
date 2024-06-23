<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPages;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
Route::get("form1",[MyController::class,'info']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('home', [FrontPages::class, 'home'])->name('home');
Route::get('contact', [FrontPages::class, 'contact'])->name('contact');
Route::get('doctors', [FrontPages::class, 'doctors'])->name('doctors');
Route::get('blog', [FrontPages::class, 'blog'])->name('blog');
Route::get('services', [FrontPages::class, 'services'])->name('services');
Route::get('pages', [FrontPages::class, 'pages'])->name('pages');
Route::get('error', [FrontPages::class, 'error'])->name('error');
    });

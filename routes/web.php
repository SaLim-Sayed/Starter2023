<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return redirect()->route('offers.index');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::prefix('offers')->middleware('auth')->controller(OfferController::class)->group(function () {
            Route::get('/', 'index')->name('offers.index');
            Route::get('/create', 'create')->name('offers.create');
            Route::post('/store', 'store')->name('offers.store');
            Route::get('/edit/{id}', 'edit')->name('offers.edit');
            Route::post('/update/{id}', 'update')->name('offers.update');
            Route::get('/delete/{id}', 'delete')->name('offers.delete');
            Route::get('/truncate', 'truncate')->name('offers.truncate');
            Route::get('/video', 'video')->name('offers.video');
        });
    });

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

/*
echo "# Starter2023" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/SaLim-Sayed/Starter2023.git
git push -u origin main
 */

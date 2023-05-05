<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\StartpageController;
use App\Http\Controllers\FallbackController;
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
/*startpage when visiting the webpage and about page with instructions to use the site*/
Route::get('/', [StartpageController::class, 'userhome']);
Route::get('/about',function(){
    return view('about');
});

/*Auth routes came with laravel/ui from composer*/

Auth::routes();



/*Resource controllers for transaction-category-saving goals and the home (Can only be accessed with a login form a user)*/
Route::middleware('auth')->group(function() {
        Route::resource('transaction', TransactionsController::class);
        Route::resource('category', CategoryController::class);
        Route::resource("saving",\App\Http\Controllers\SavingGoalController::class);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Fallback page if a page doesn't exist
Route::fallback(FallbackController::class);








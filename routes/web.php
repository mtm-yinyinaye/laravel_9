<?php

use App\Http\Controllers\GithubSocialiteController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return "Login Success";
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index');
    Route::post('/login', 'login')->name('login');
    Route::get('/testing/test', 'test');

});

Route::controller(GoogleSocialiteController::class)->group(function() {
    Route::get('/auth/google', 'redirect'); // go to google sign in page
    Route::get('/callback/google', 'handleCallback'); // retrieving user details
});


Route::controller(GithubSocialiteController::class)->group(function() {
    Route::get('/auth/github', 'redirect'); // go to google sign in page
    Route::get('/callback/github', 'handleCallback'); // retrieving user details
});
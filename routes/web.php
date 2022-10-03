<?php

use App\Http\Controllers\TestController;
use App\View\Components\HelloWorld;
use Illuminate\Support\Facades\Blade;
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

Route::get('/test', function() {
    return 'Hello World';
});

// Test controller
// Route::get('/posts', [TestController::class, 'index']);
// Route::get('/post/create', [TestController::class, 'index']);
// Route::post('/post/store', [TestController::class, 'index']);
// Route::get('/post//{id}/edit', [TestController::class, 'index']);
// Route::post('/post/update', [TestController::class, 'index']);
// Route::delete('/post/delete/{id}', [TestController::class, 'delete']);



Route::controller(TestController::class)->group(function() {
    Route::get('/posts', 'index')->name('posts');
    Route::prefix('/post')->group(function() {
        Route::get('/create', 'create');
        Route::post('/store', 'store')->name('post.store');
        // Route::get('//{id}/edit', 'edit');
        // Route::post('/update', 'update');
        // Route::delete('/delete/{id}', 'delete');
    });
});


Route::get('/component', function(){
    // return view('hello');
    return Blade::renderComponent(new HelloWorld('Julian Bashir'));

});

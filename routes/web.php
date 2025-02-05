<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/manage/posts', function () {
    //     return view('posts');
    // })->name('posts');

    Route::get(
        '/manage/posts',
        'App\Http\Controllers\Manage\PostController@index'
    )->name('posts');


    // Route::get('modeler/{process}', 'Process\ModelerController')->name('modeler.show')->middleware('can:edit-processes');
});



require __DIR__ . '/auth.php';

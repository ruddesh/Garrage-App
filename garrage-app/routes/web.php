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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [App\Http\Controllers\FormsController::class, 'index']);
Route::post('/form', [App\Http\Controllers\FormsController::class, 'store']);
// Route::get('/getCarNames', function () {
//     if (Request::ajax()) {
//         return 'getcars has loaded';
//     }
// });
Route::get('/getCarNames', [App\Http\Controllers\FormsController::class, 'getCars']);
Route::post('/category', [App\Http\Controllers\FormsController::class, 'setCatogory']);
Route::get('/getCarYear', [App\Http\Controllers\FormsController::class, 'getCarManufacturingYear']);
Route::get('/categories', [App\Http\Controllers\FormsController::class, 'getCategories']);
Route::get('/services', [App\Http\Controllers\FormsController::class, 'getServices']);
Route::post('/services', [App\Http\Controllers\FormsController::class, 'storeService']);
// Route::get('/asdf', [App\Http\Controllers\FormsController::class, 'getOnlyServicesColumnValues']);

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Route::get('dashboard', function () {
//     return view('welcome');
// });
// Route::get('{any}', function () {
//     // return view('welcome');
//     echo "OK";
// })->where('any','.*');


Route::get('fest/{vue_capture?}', function(){
    return view('home');
})->where('vue_capture','.*');

Route::get('/{vue_capture?}', function(){
    return view('welcome');
})->where('vue_capture','[\/\w\.-]*');
Auth::routes();



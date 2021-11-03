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
    $response = [];

    $response[9] = \App\Models\User::registeredSelectedMonth([9])->count();
    $response['7-8-9'] = \App\Models\User::registeredSelectedMonth([7, 8, 9])->count();
});

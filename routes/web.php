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

Route::get('/{month}', function (\Illuminate\Http\Request $request, $month) {

    $selectedMonthUsersCount = \App\Models\User::registeredSelectedMonth([$month])->count();
    return view('welcome', compact('selectedMonthUsersCount'));
});

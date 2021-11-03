<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/select/{month}', function (\Illuminate\Http\Request $request, $month) {
    $selectedMonthUsersCount = \App\Models\User::registeredSelectedMonth([$month])->count();

    return [
        'selectedMonth' => $selectedMonthUsersCount,
    ];
});

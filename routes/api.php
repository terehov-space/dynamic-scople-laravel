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

Route::get('/select', function (\Illuminate\Http\Request $request) {
    $selectedMonthUsersCount = \App\Models\User::select(
        \Illuminate\Support\Facades\DB::raw(
            "COUNT(id) AS cnt, DATE_FORMAT(created_at, '%m') AS month"
        )
    )
        ->registeredSelectedMonth($request->get('months') ?? [])
        ->groupBy('created_at')
        ->get();

    return [
        'selectedMonth' => $selectedMonthUsersCount,
    ];
});

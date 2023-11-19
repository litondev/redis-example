<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache; 

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/",function() {
    // Cache::store('redis');

    $value = Cache::remember('users',now()->addDays(1),function(){
        return \App\Models\User::get();
    });

    return response()->json($value);
});

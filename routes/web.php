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

Route::get("/user",function() {
    // Cache::store('redis');
    
    // \Log::info(json_encode(Cache::get("users")));

    $value = Cache::remember('users',now()->addDays(1),function(){
        return \App\Models\User::get();
    });
    // 150 ms 

    // $value = \App\Models\User::get();
    // 222 ms 

    return response()->json($value);
});

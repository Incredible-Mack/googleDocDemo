<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

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

Route::get('/testing', function () {
    return 'hi';
});

Route::get('/', function (){
    return view('welcome');
});

Route::get('/apis/hitlist', function () {
    $dummyData = [
        'message' => 'Hello, this is dummy data!',
        'data' => [
            'key' => 'value',
            'another_key' => 'another_value',
        ],
    ];

    return new JsonResponse($dummyData);
});

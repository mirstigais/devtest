<?php

use App\Services\Purchase\PurchaseService;
use App\Services\User\UserService;
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

Route::get('/users', [UserService::class, 'list']);
Route::get('/users/{id}',[UserService::class, 'getUserById'])
    ->middleware('validateUserServiceRequest');

Route::get('/items',[PurchaseService::class, 'list']);
Route::post('/purchase/{userId}/{productId}', [PurchaseService::class, 'purchase'])
    ->middleware('validatePurchaseServiceRequest')->name('buyProduct');

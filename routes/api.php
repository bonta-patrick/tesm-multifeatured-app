<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/channels/channel/{channel}/messages', [ChannelsController::class, "getMessages"]);
Route::post('/channels/channel/{channel}/{user}/new-message', [ChannelsController::class, "storeMessage"]);
Route::post('/channels/channel/{channel}/{user}/new-image', [ChannelsController::class, "storeMediaMessage"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

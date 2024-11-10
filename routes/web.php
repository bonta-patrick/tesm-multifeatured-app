<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChannelsController;

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

Route::get('/channels/{user}', [ChannelsController::class, "showUserChannelsPage"]);
Route::get('/', [UserController::class, "showCorrectHomePage"]);
Route::get('/profile', [ProfileController::class, "showProfilePage"]);
Route::get('/login', [UserController::class, "loginPage"]);
Route::get('/channels', [ChannelsController::class, "channelsPage"]);
Route::get('/channels/channel/{channel}', [ChannelsController::class, "showChannel"]);
Route::get('/profile/{user}', [ProfileController::class, "showUserProfile"]);
Route::get('/comments/{post}', [CommentController::class, "showMobileCommentPage"]);

Route::post('/register-user', [UserController::class, "registerUser"]);
Route::post('/login-user', [UserController::class, "loginUser"]);
Route::post('/save-avatar', [UserController::class, "saveAvatar"]);
Route::post('/create-new-post', [PostController::class, "createPost"]);
Route::post('/create-new-comment/{post}', [CommentController::class, "createNewComment"]);
Route::post('/create-like/{post}', [PostController::class, "addLikeToPost"]);
Route::post('/remove-like/{post}', [PostController::class, "removeLikeFromPost"]);
Route::post('/create-channel', [ChannelsController::class, "createNewChannel"]);
Route::post('/join-channel/{channel}', [ChannelsController::class, "joinChannel"]);
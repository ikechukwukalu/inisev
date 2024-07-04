<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * @group No Auth APIs
 *
 * APIs that do not require User authentication
 */

/**
 * @group Auth APIs
 *
 * APIs that require User authentication
 */

/**
 * @group Web URLs
 *
 * APIs that do not require User authentication and is performed over a web browser
 *
 * @subgroup Socialite APIs
 * @subgroup TwoFactor APIs
 */


Route::middleware('auth:sanctum')->group(function () {
    require __DIR__.'/app/user.php';
});

require __DIR__.'/app/public.php';

use App\Http\Controllers\UserSubController;

Route::prefix('user_sub')->group(function () {

    Route::post('create', [UserSubController::class, 'create'])->name('createUserSub');
    Route::delete('delete', [UserSubController::class, 'delete'])->name('deleteUserSub');
    Route::get('read/{id?}', [UserSubController::class, 'read'])->name('readUserSub');
    Route::put('update', [UserSubController::class, 'update'])->name('updateUserSub');

});

use App\Http\Controllers\WebsiteController;

Route::prefix('website')->group(function () {

    Route::post('create', [WebsiteController::class, 'create'])->name('createWebsite');
    Route::delete('delete', [WebsiteController::class, 'delete'])->name('deleteWebsite');
    Route::get('read/{id?}', [WebsiteController::class, 'read'])->name('readWebsite');
    Route::put('update', [WebsiteController::class, 'update'])->name('updateWebsite');

});

use App\Http\Controllers\UserPubController;

Route::prefix('user_pub')->group(function () {

    Route::post('create', [UserPubController::class, 'create'])->name('createUserPub');
    Route::delete('delete', [UserPubController::class, 'delete'])->name('deleteUserPub');
    Route::get('read/{id?}', [UserPubController::class, 'read'])->name('readUserPub');
    Route::put('update', [UserPubController::class, 'update'])->name('updateUserPub');

});

<?php

use App\Http\Controllers\Api\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('users', [UserApiController::class, 'index']);
// Route::get('users/{id}', [UserApiController::class, 'show']);

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::post('/users/upload/{id}', [UserApiController::class, 'upload']);
        Route::resource('users', UserApiController::class);
    }
);

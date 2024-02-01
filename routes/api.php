<?php

use App\Http\Controllers\API\AppVideosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\AppVideos;
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

Route::get( 'get-videos', [ AppVideosController::class, 'indedashboardx' ] );

Route::get( 'get-videos/dashboard/{type}', [ AppVideosController::class, 'dashboard' ] );
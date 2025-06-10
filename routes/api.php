<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CancerController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AuthController;
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




Route::middleware('jwt.auth')->post('/dispense', function (Request $request) {
    // Validate prescription_id, quantity, check inventory, etc.
    // Update inventory and return response
    return response()->json(['message' => 'Drug dispensed successfully']);
});



// Protected routes (require JWT)
Route::middleware('auth:api')->group(function () {
    Route::get('/cancers', CancerController::class . '@index');
   
});


Route::get('/roles', [RolesController::class, 'retrieveAll']);
Route::get('/roles/hospital', [RolesController::class, 'hospitalRoles']);
Route::get('/roles/nicrat', [RolesController::class, 'nicratRoles']);
Route::post('/roles', [RolesController::class, 'store']);

Route::post('/users/register', [AuthController::class, 'register']);
Route::post('/users/login', [AuthController::class, 'login']);
Route::post('/users/logout', [AuthController::class, 'logout']);
Route::get('/users/profile', [AuthController::class, 'profile'])->middleware('auth:api');
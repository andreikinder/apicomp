<?php

use App\Http\Controllers\StoragedeviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\VerifyCompatibilityController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GraphiccardController;
use App\Http\Controllers\MotherboardController;
use App\Http\Controllers\PowersupplyController;
use App\Http\Controllers\ProcessorController;
use App\Http\Controllers\RammemoryController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests;
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


Route::controller(UserController::class)->group( function (){
    Route::post('/register',  'register');
    Route::post('/login', 'login')->name('login');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/search/{category}', [SearchController::class, 'search'] );
    Route::get('/motherboards', [MotherboardController::class, 'index']);
    Route::get('/processors', [ProcessorController::class, 'index']);
    Route::get('/ram-memories', [RammemoryController::class, 'index']);
    Route::get('/graphic-cards',[GraphiccardController::class, 'index']);
    Route::get('/power-supplies', [PowersupplyController::class, 'index']);
    Route::get('/storage-devices',[StoragedeviceController::class, 'index']);
    Route::apiResources([ 'machines' => MachineController::class, ]);
    Route::get('/images/{id}', [ ImageController::class, 'show']);
    Route::post('/verify-compatibility', [VerifyCompatibilityController::class, 'verify']);
});























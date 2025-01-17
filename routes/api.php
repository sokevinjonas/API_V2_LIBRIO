<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\LivreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group( function() {
    Route::resource('livres', LivreController::class);
    Route::resource('categories', CategoryController::class);
});

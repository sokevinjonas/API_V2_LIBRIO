<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FileController;
use App\Http\Controllers\API\LivreController;
use App\Http\Controllers\API\CategoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group( function() {
    Route::resource('livres', LivreController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/files/{path}', [FileController::class, 'getFile'])
    ->where('path', '.*'); // Accepte n'importe quel chemin
});

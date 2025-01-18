<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getFile($path)
    {
        try {
            $decodedPath = urldecode($path); // Décoder l'URL encodée
            if (Storage::disk('public')->exists($decodedPath)) {
                return response()->file(storage_path('app/public/' . $decodedPath));
            } else {
                return response()->json(['error' => 'File not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the file'], 500);
        }
    }
}

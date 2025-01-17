<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getProfile(){
        $userId = Auth::user()->id;
        return User::where('id', $userId)->first();
    }
}

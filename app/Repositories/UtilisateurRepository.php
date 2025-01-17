<?php

namespace App\Repositories;

use App\Models\User;
use App\Interface\UtilisateurInterface;

class UtilisateurRepository implements UtilisateurInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getUtilisateurs()
    {
        return User::latest()->get();
    }
}

<?php

namespace App\Repositories;

use App\Models\Livre;

class LivresRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

   public function apiIndexLivre(){
    return Livre::with('category')->latest()->get();
   }

   public function apiShowLivre(Livre $livre){
    dd($livre);
   }
}


<?php

namespace App\Interface;

interface LivreInterface
{
    //
    function apiIndexLivre(): bool;
    function apiShowLivre($livre): bool;
}

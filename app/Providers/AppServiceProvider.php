<?php

namespace App\Providers;

use App\Interface\CategoryInterface;
use App\Interface\LivreInterface;
use App\Interface\ProfileInterface;
use App\Interface\UserInterface;
use App\Interface\UtilisateurInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\LivresRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;
use App\Repositories\UtilisateurRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class,
            LivreInterface::class,
            LivresRepository::class,
            ProfileInterface::class,
            ProfileRepository::class,
            UserInterface::class,
            UserRepository::class,
            UtilisateurInterface::class,
            UtilisateurRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

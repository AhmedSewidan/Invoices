<?php

namespace App\Providers;

use App\Livewire\Posts;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerComponents();
    }
    protected function registerComponents()
    {
        Livewire::component('posts', Posts::class);
    }

}

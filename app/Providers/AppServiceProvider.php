<?php

namespace App\Providers;

use App\Services\Registration\RegistrationService;
use App\Services\Registration\V1\RegistrationServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindServices();
    }
    private function bindServices()
    {
        $this->app->singleton(RegistrationService::class,RegistrationServiceImpl::class);
    }

}

<?php

namespace App\Providers;

use App\Services\ActivityLogService;
use App\Services\BorrowerService;
use App\Services\LoanProviderService;
use App\Services\LoanService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $this->app->bind(BorrowerService::class, function($app) {
           return new BorrowerService();
        });

        $this->app->bind(LoanProviderService::class, function($app) {
           return new LoanProviderService();
        });

        $this->app->bind(LoanService::class, function($app) {
            return new LoanService();
        });

        $this->app->bind(ActivityLogService::class, function($app) {
           return new ActivityLogService();
        });
    }
}

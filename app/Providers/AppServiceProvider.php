<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // Get Laravel's timezone offset dynamically
        $offset = now()->format('P'); // e.g., +05:30 for Asia/Kolkata

        // Set MySQL session timezone to match Laravel
        DB::statement("SET time_zone = '{$offset}'");

        // Load your helper file
        require_once app_path('Helpers/ClinicalTestHelper.php');
    }
}

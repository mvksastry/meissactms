<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class CtmsEventServiceProvider extends ServiceProvider
{


    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

            \App\Events\Ctms\PatientEnrollmentAborted::class => [
            \App\Listeners\Ctms\LogPatientEnrollmentAborted::class,
            ],
        
            \App\Events\PatientEnrollmentCompleted::class => [
            \App\Listeners\Ctms\LogPatientEnrollmentSuccess::class,
            ],

            \App\Events\Ctms\ModelUpdateRequested::class => [
            \App\Listeners\Ctms\RunModelUpdates::class,
            ],

            \App\Events\TestEvent::class => [
            \App\Listeners\TestListener::class,
            ],
        // Add more events here...
    ];

    /**
     * Register services.
     */
    /*
    public function register(): void
    {
        //
    }
    */
    /**
     * Bootstrap services.
     */
    /*
    public function boot(): void
    {
        //
    }
    */
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Login;

class LogUserAuthentication
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Log to storage/logs/laravel.log
        //Log::channel('loggedin')->info('User with ID', [
        //    'email' => $event->user->email,
        //    'time' => now()->toDateTimeString(),
        //]);
        /*
        // Optional: Log to a custom file
        Log::channel('userlog')->info('User registered', [
            'id' => $event->user->id,
            'email' => $event->user->email,
        ]);
        */
    }
}

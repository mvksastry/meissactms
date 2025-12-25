<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Failed;

class FailedLogin
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
    public function handle(Failed $event): void
    {
        // Log to storage/logs/laravel.log
        Log::channel('failed')->info('User with ID failed', [
            'email' => $event->user->email,
            'time' => now()->toDateTimeString(),
        ]);
    }
}

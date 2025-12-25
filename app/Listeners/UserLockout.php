<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Lockout;

class UserLockout
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
    public function handle(Lockout $event): void
    {
        // Log to storage/logs/laravel.log
        Log::channel('lockout')->info('User Loged out with ID', [
            'email' => $event->user->email,
            'time' => now()->toDateTimeString(),
        ]);
    }
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Logout;

class UserLogout
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
    public function handle(Logout $event): void
    {
        //
        Log::channel('logout')->info('User with ID', [
            'email' => $event->user->email,
            'time' => now()->toDateTimeString(),
        ]);
    }
}

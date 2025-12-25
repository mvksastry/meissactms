<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Attempting;

use App\Models\User;

class UserAttempting
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
        //$this->guard = $guard;
        //$this->credentials = $credentials;
    }

    /**
     * Handle the event.
     */
    public function handle(Attempting $event): void
    {
        Log::channel('authenticated')->info('User with ID attempting', [
            //'gurard' => $guard,
           // 'email' => $event->user->email,
            'time' => now()->toDateTimeString(),
        ]);
    }
}

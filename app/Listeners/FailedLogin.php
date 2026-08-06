<?php

namespace App\Listeners;

use Illuminate\Http\Request;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Failed;

class FailedLogin
{
    /**
     * Create the event listener.
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Failed $event)
    {
    $request = request(); // current request instance

    Log::channel('failed')->info('User login failed', [
        'email'      => $event->credentials['email'] ?? 'N/A',
        'ip'         => $request->ip(),
        'user_agent' => $request->header('User-Agent'),
        'time'       => now()->toDateTimeString(),
    ]);
}
}

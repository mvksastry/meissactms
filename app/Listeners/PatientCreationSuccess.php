<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\NewPatientCreated;

use App\Models\Patient;

class PatientCreationSuccess
{

    /**
     * Create the event listener.
     */
    public function __construct()
    { //        
    }

    /**
     * Handle the event.
     */
    public function handle(NewPatientCreated $event): void
    {
        dd("event fired and listened");
        // Log to storage/logs/laravel.log
        Log::channel('patient')->info('Patient with ID', [
            'ID' => $event->patient_uuid,
            'time' => now()->toDateTimeString(),
        ]);
    }
}

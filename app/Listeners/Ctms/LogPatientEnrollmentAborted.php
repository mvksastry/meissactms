<?php

namespace App\Listeners\Ctms;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Ctms\PatientEnrollmentAborted;

use App\Models\Events\CtmsEventLog;
//logs
use Illuminate\Support\Facades\Log;

class LogPatientEnrollmentAborted
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
    public function handle(PatientEnrollmentAborted $event): void
    {
        //
        Log::channel('patient')->info('Listener triggered for PatientEnrollmentAborted', [
            'patient_id' => $event->patient->patient_id
        ]);

        CtmsEventLog::create([
            'event_name' => 'PatientEnrollmentAborted',
            'payload'    => json_encode([
                'patient_id' => $event->patient->patient_id,
                'name'       => $event->patient->name,
                'timestamp'  => now()->toDateTimeString(),
            ]),
        ]);
    }
}

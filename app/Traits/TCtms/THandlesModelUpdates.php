<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Throwable;

trait THandlesModelUpdates
{
    /**
     * Update or create diagnostic test data for a patient with transaction handling.
     *
     * @param  string  $modelName
     * @param  string  $modelClss
     * @param  array   $input
     * @param  string  $patientUuid
     * @return bool  True on success, false on failure
     */
    public function updateOrCreateDiagnosticTest(
        string $patientUuid,
        string $modelName,
        array $input
    ): bool {

        // Lookup model class from config
        $modelClass = Config::get('ctms.tests.'.$modelName);
                    
        // Ensure it's an Eloquent model
        if (!is_subclass_of($modelClass, \Illuminate\Database\Eloquent\Model::class)) {
            throw new InvalidArgumentException("{$modelClass} is not a valid Eloquent model.");
        }

        // Attach patient UUID
        $input['patient_uuid'] = $patientUuid;

        // Prepare message
        $typeLabel = ($input['data_type'] ?? null) === 'unscheduled'
            ? '[Unscheduled Type]'
            : '[Follow-up Type]';

        $message = "{$modelName} {$typeLabel} Data Updated";

        try {
            DB::transaction(function () use ($modelClass, $input, $patientUuid) {
                if (($input['data_type'] ?? null) === 'unscheduled') {
                    // Always create a new record for unscheduled visits
                    $modelClass::create($input);
                } else {
                    // Search criteria for follow-ups
                    $search = [
                        'patient_uuid' => $patientUuid,
                        'data_type'    => $input['data_type'] ?? null,
                    ];
                    $modelClass::updateOrCreate($search, $input);
                }
            });

            // Livewire success alert
            LivewireAlert::title($message)
                    ->success()
                    ->asToast()
                    ->show();
            // Success log
            Log::channel('patient')->info($this->formatLogMessage($message, $input, $patientUuid));

            return true;
        } catch (Throwable $e) {
            $errorMessage = "{$message} | Error: " . $e->getMessage();

            LivewireAlert::title("Failed: {$errorMessage}")
                    ->error()
                    ->asToast()
                    ->show();
            // Failure log
            Log::channel('patient')->error($this->formatLogMessage($errorMessage, $input, $patientUuid) . ' | Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Format log message consistently.
     */
    private function formatLogMessage(string $message, array $input, string $patientUuid): string
    {
        return sprintf(
            'User [%s] saved [%s] %s for Patient [%s]',
            Auth::user()->name ?? 'System',
            $input['data_type'] ?? 'unknown',
            $message,
            $patientUuid
        );
    }
}
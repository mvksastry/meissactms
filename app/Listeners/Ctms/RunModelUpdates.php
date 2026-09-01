<?php

namespace App\Listeners\Ctms;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;

//jobs to carry out the task
use App\Jobs\Ctms\UpdateModelStatusJob;

//Event to link
use App\Events\Ctms\ModelUpdateRequested;

class RunModelUpdates
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
    public function handle(\App\Events\Ctms\ModelUpdateRequested $event): void
    {
        Log::channel('psfc')->info('MU-D2: RunModelUpdates listener started', [
            'uuid' => $event->uuid,
            'status' => $event->status,
            'status_comment' => $event->status_comment,
            'listener' => __CLASS__,
            'method' => __FUNCTION__,
        ]);

        // List of all models to update
        $models =  config('ctms.tests');

        Log::channel('psfc')->info('MU-D3: Models loaded from config', ['models' => $models]);

        if (empty($models)) {
            \Log::channel('psfc')->error('MU-L1: No models found in config(ctms.tests)');
            return;
        }else {
            \Log::channel('psfc')->info('MU-L1: Models found in config(ctms.tests)');
        }

        // Build and dispatch batch
        // Step 2: Build jobs
        $jobs = collect($models)->map(function ($modelClass, $key) use ($event) {
                
        Log::channel('psfc')->debug("MU-D4: Processing model key '{$key}'", [
                    'model_class' => $modelClass
        ]);

        if (!class_exists($modelClass)) {
            Log::channel('psfc')->error("MU-L1: Invalid model class for key '{$key}': {$modelClass}");
            return null; // skip invalid
        }

        Log::channel('psfc')->info("MU-D4: Creating job for model {$modelClass}");

            return new \App\Jobs\Ctms\UpdateModelStatusJob(
                    $modelClass,
                    $event->uuid,
                    $event->status,
                    $event->status_comment
                );
        })->filter();

        Log::channel('psfc')->debug('MU-D5: Prepared jobs', [
            'job_classes' => $jobs->map(fn($j) => get_class($j))->values()->all()
        ]);

        if ($jobs->isEmpty()) {
            Log::channel('psfc')->error('MU-L1: No valid jobs to dispatch after validation.');
            return;
        }

        // Step 3: Dispatch batch
        foreach ($jobs as $job) {
            $jobName = get_class($job); // defined here
            $start = microtime(true);
            Log::channel('psfc')->info("MU-L0: Dispatching job: {$jobName}", [
                'job_payload' => get_object_vars($job)
            ]);

            try {
                Bus::dispatchSync($job); // or $this->dispatch($job) inside a job/listener
            } catch (\Throwable $e) {
                Log::channel('psfc')->error("MU-L2: Job failed: {$jobName}", [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                continue; // move to next job
            }
            $duration = round((microtime(true) - $start) * 1000, 2);
            Log::channel('psfc')->info("MU-L0: Finished executing job: {$jobName}", [
                'duration_ms' => $duration
            ]);
        }

        //Bus::batch($jobs)->onConnection('sync')->dispatch();
        Log::channel('psfc')->info('MU-L0: All model update jobs executed.', [
            'job_count' => $jobs->count()
        ]);

    }
}

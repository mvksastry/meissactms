<?php

namespace App\Jobs\Ctms;

use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;
use Illuminate\Support\Facades\Log;


class UpdateModelStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    protected string $modelClass;
    protected string $uuid;
    protected string $status;
    protected string $comment;
    protected string $comment_entered_by;

    /**
     * Create a new job instance.
     */
    public function __construct(string $modelClass,
                                string $uuid,
                                string $status,
                                string $status_comment)
    {
        //
        $this->modelClass = $modelClass;
        $this->uuid = $uuid;
        $this->status = $status;
        $this->comment_entered_by = $status_comment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         \Log::info('JOB-START: ' . __CLASS__, [
            'model' => $this->modelClass,
            'patient_uuid' => $this->uuid
        ]);

        //
        try {
            if (!class_exists($this->modelClass)) {
                Log::error("Model class {$this->modelClass} does not exist.");
                return;
            }

            $model = $this->modelClass::where('patient_uuid', $this->uuid)->first();

            if (!$model) {
                Log::warning("MU-L1: Record not found: {$this->modelClass} ID {$this->uuid}");
                return;
            } else{
                // Modify fields instead of appending
                $model->status = $this->status;
                $model->status_date = date('Y-m-d');
                $model->appendComment('comment_entered_by', $this->comment_entered_by);

                $model->save();

                \Log::info('JOB-END: ' . __CLASS__, [
                    'model' => $this->modelClass,
                    'uuid' => $this->uuid
                ]);

                $msg = "Updated {$this->modelClass} Patient uuid {$this->uuid} with new comment and date.";

                Log::channel('patient')->info($msg);
            }

        } catch (\Throwable $e) {
            Log::error("Error Updating {$this->modelClass} Patient uuid {$this->uuid}: " . $e->getMessage());
        }
    }
}

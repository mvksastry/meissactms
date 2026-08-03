<?php

namespace App\Livewire\EHub;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activity;
use App\Models\Ctms\Patient;
use App\Models\User;
use App\Models\Ctms\Decisions\Enrollment;
use App\Models\Ehub\ChondcyteProduction;
use App\Models\Ehub\BprChondrocytesStep;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TCtms\TActivityQueries;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Validator;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class BmrChondrocyteProduction extends Component
{
    //variables globals
    public $ccps, $productionForm = false;

    //the selected production id
    public $selectedCcps;

    //step table
    public $ccps_steps = null;

    //form variables
    public $step_completed, $date_time, $done_executed_by;
    public $checked_by, $observations, $deviations, $all_verified, $post_data;

    public function render()
    {
        $this->ccps = ChondcyteProduction::with('assigned')
                                            ->with('ctmsinfo')
                                            ->where('status', 'active')->get();
        //dd($this->ccps);
        return view('livewire.e-hub.bmr-chondrocyte-production');
    }

    public function fnOpenProductionForm($chondcyte_production_id)
    {
        $this->selectedCcps = ChondcyteProduction::where('chondcyte_production_id', $chondcyte_production_id)->first();
        //dd($this->selectedCcps);
        $this->ccps_steps = BprChondrocytesStep::where('bpr_chondrocyte_step_id', $this->selectedCcps->current_stage)->first();
        //dd($this->ccps_steps);
        $this->productionForm = true;
    }

    public function fnCreateChondrocyteProductionStepRecord()
    {
        $validatedData = $this->validate([
            'step_completed' => 'required|string|max:255',
            'date_time' => 'required|boolean',
            'done_executed_by' => 'required|string|max:255',
            'checked_by' => 'required|string|max:255',
            'observations' => 'required|string|max:1000',
            'deviations' => 'nullable|string|max:1000',
            'all_verified' => 'boolean',
            'post_data' => 'boolean',
        ]);

        if($this->date_time)
        {
            if($this->all_verified)
            {
                if($this->post_data)
                {
                    $current_step = $this->ccps_steps->bpr_chondrocyte_step_id;

                    //First Collect all info
                    $FormInput['step_no'] = $this->ccps_steps->bpr_chondrocyte_step_id;
                    $FormInput['date_time'] = date('Y-m-d H:i:s');
                    $FormInput['description'] = $this->ccps_steps->description;
                    $FormInput['step_completed'] = $this->step_completed;
                    $FormInput['done_executed_by'] = $this->done_executed_by;
                    $FormInput['checked_by'] = $this->checked_by;
                    $FormInput['observations'] = $this->observations;
                    $FormInput['deviations'] = $this->deviations;
                    //get the current_stage from data base
                    $db_stages = $this->ccps_steps->completed_stages;

                    //mext decode to get the array
                    $db_stagex = json_decode($db_stages, true);
                    array_push($db_stagex, $FormInput);

                    $final_result = json_encode($db_stagex);
                    //dd($final_result);
                    $comment = "Step-".$current_step." Completed.";
                    $this->selectedCcps->completed_stages = $final_result;
                    $this->selectedCcps->current_stage = $current_step + 1;
                    $this->selectedCcps->comments = $comment;
                    $this->selectedCcps->status_date = date('Y-m-d');
                    $this->selectedCcps->save();
                    LivewireAlert::title($comment)->success()->show();
                }
            }
        }
        // Optionally, you can reset the form fields after successful submission
        $this->reset(['step_completed', 'date_time', 'done_executed_by', 'checked_by', 'observations', 'deviations', 'all_verified', 'post_data']);
        $this->productionForm = false;
        // Optionally, you can show a success message or redirect the user
        session()->flash('message', 'Step data has been successfully entered.');
    }
}

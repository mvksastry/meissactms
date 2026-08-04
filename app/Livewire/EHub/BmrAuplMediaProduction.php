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
use App\Models\Ehub\AuplMediaProduction;
use App\Models\Ehub\AuplMediumStep;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TCtms\TActivityQueries;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Validator;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class BmrAuplMediaProduction extends Component
{
    //variables globals
    public $amps, $productionForm = false;

    //the selected production id
    public $selectedAmps;

    //step table
    public $amps_steps = null;

    //form variables
    public $enter_details, $step_completed, $date_time, $done_executed_by;
    public $checked_by, $observations, $deviations, $all_verified, $post_data;

    public function render()
    {
        $this->amps = AuplMediaProduction::with('assigned')
                                            ->with('ctmsinfo')
                                            ->where('status', 'active')->get();
        //dd($this->amps);
        return view('livewire.e-hub.bmr-aupl-media-production');
    }

    public function fnOpenProductionForm($auplmed_production_id)
    {
        $this->selectedAmps = AuplMediaProduction::where('auplmed_production_id', $auplmed_production_id)->first();
        //dd($selectedAmps);
        $this->amps_steps = AuplMediumStep::where('aupl_medium_step_id', $this->selectedAmps->current_stage)->first();
        //dd($this->amps_steps);
        $this->productionForm = true;
    }

    public function fnCreateAuplMediaProductionStepRecord()
    {
    
        $validatedData = $this->validate([
            'enter_details' => 'sometimes|nullable|string|max:55',
            'step_completed' => 'required|string|max:255',
            'date_time' => 'required|boolean',
            'done_executed_by' => 'required|string|max:255',
            'checked_by' => 'required|string|max:255',
            'observations' => 'required|string|max:1000',
            'deviations' => 'nullable|string|max:1000',
            'all_verified' => 'boolean',
            'post_data' => 'boolean',
        ]);

        // Create a new record in the database
        if($this->date_time)
        {
            if($this->all_verified)
            {
                if($this->post_data)
                {
                    $current_step = $this->amps_steps->aupl_medium_step_id;

                    //First Collect all info
                    $FormInput['step_no'] = $this->amps_steps->aupl_medium_step_id;
                    $FormInput['enter_details'] = $this->enter_details;
                    $FormInput['date_time'] = date('Y-m-d H:i:s');
                    $FormInput['description'] = $this->amps_steps->description;
                    $FormInput['step_completed'] = $this->step_completed;
                    $FormInput['done_executed_by'] = $this->done_executed_by;
                    $FormInput['checked_by'] = $this->checked_by;
                    $FormInput['observations'] = $this->observations;
                    $FormInput['deviations'] = $this->deviations;

                    //get the current_stage from data base
                    $db_stages = $this->selectedAmps->completed_stages;
                    
                    //mext decode to get the array
                    $db_stagex = json_decode($db_stages, true);
                    array_push($db_stagex, $FormInput);
            
                    //now json_encode the result ready for update the column
                    $final_result = json_encode($db_stagex);
                    //dd($final_result);
                    $comment = "Step-".$current_step." Completed.";
                    $this->selectedAmps->completed_stages = $final_result;
                    $this->selectedAmps->current_stage = $current_step + 1;
                    $this->selectedAmps->comments = $comment;
                    $this->selectedAmps->status_date = date('Y-m-d');
                    $this->selectedAmps->save();
                    LivewireAlert::title($comment)->success()->show();
                    //prepare data now.
                    //dd($result, $final_result, $this->selectedAmps);
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

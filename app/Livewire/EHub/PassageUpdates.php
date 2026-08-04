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
use App\Models\Ehub\Passage;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TCtms\TActivityQueries;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Validator;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class PassageUpdates extends Component
{
    //variables globals
    public $ccps, $passagesForm = false;

    //the selected production id
    public $selectedCcps;

    //step table
    public $ccps_steps = null;

    //form variables
    public $enter_details, $step_completed, $date_time, $done_executed_by;
    public $checked_by, $observations, $deviations, $all_verified, $post_data;

    public $cell_line_id, $cell_line_origin, $cell_line_origin_comment;
    public $passage_number, $passage_date, $passage_day, $type,  $transfer_date, $transfer_day;
    public $cell_count, $status, $comments;

    public $flask_type, $transfer_falsk_date, $transfer_flask_day;
    public $plate_type, $transfer_plate_date, $transfer_plate_day;

    //passage form variables
    public $passageinfo, $passageInfos = [], $showPassageForm, $plate_or_flask;
    public $showPlateRow = false, $showFlaskRow = false;

    public function render()
    {
        $this->ccps = ChondcyteProduction::with('assigned')
                                            ->with('ctmsinfo')
                                            ->where('status', 'active')->get();
        return view('livewire.e-hub.passage-updates');
    }

    public function fnOpenProductionForm($chondcyte_production_id)
    {
        $this->selectedCcps = ChondcyteProduction::where('chondcyte_production_id', $chondcyte_production_id)->first();
        //dd($this->selectedCcps);
        $this->passageInfos = Passage::where('chondcyte_production_id', $chondcyte_production_id)->get();

        $this->passagesForm = true;
    }

    public function updated($plate_or_flask, $value)
    {
        //dd("reached ".$value);
        if($value === 'plate')
        {
            $this->showPlateRow = true;
            $this->showFlaskRow = false;
        }
        if($value === 'flask')
        {
            $this->showPlateRow = false;
            $this->showFlaskRow = true;
        }
        //LivewireAlert::title($value."Selected")->info()->show();
    }

    public function fnOpenPassageForm()
    {
        //LivewireAlert::title('passage info clicked')->info()->show();
        $this->showPassageForm = true;
        $this->passageinfo = true;
    }

    public function fnPostPassagRecord()
    {
        //dd($this->all_verified, $this->post_data);
        
        $validatedData = $this->validate([
            'cell_line_id'              => 'required|string|max:55',
            'cell_line_origin'          => 'required|string|max:250',
            'cell_line_origin_comment'  => 'required|string|max:250',

            'passage_number'            => 'required|numeric|max:255',
            'passage_date'              => 'required|date',
            'passage_day'               => 'required|numeric',

            'type'                      => 'required|string',
            'transfer_date'             => 'required|date',
            'transfer_day'              => 'required|numeric',

            'cell_count'                => 'sometimes|nullable|numeric',

            'status'                    => 'sometimes|nullable|string|max:15',
            'comments'                  => 'sometimes|nullable|string|max:250',
        ]);
        

        if($this->all_verified)
        {
            if($this->post_data)
            {
                //first set plate or flask type
                $newPassage = new Passage();

                if($this->type === "plate")
                {
                    $newPassage->type = $this->plate_type;
                    $newPassage->transfer_day = $this->transfer_plate_day;
                    $newPassage->transfer_date = $this->transfer_plate_date;
                }
 
                if($this->type === "flask")
                {
                    $newPassage->type = $this->flask_type;
                    $newPassage->transfer_day = $this->transfer_flask_day;
                    $newPassage->transfer_date = $this->transfer_flask_date;
                }
                

                $newPassage->chondcyte_production_id = $this->selectedCcps->chondcyte_production_id;
                $newPassage->cell_line_id = $this->cell_line_id;
                $newPassage->cell_line_origin  = $this->cell_line_origin;
                $newPassage->cell_line_origin_comment = $this->cell_line_origin_comment;
                $newPassage->passage_number = $this->passage_number;
                $newPassage->passage_date = $this->passage_date;
                $newPassage->passage_day = $this->passage_day;



                $newPassage->cell_count = $this->cell_count;
                $newPassage->comments = $this->comments;
                $newPassage->status = $this->status;
                $newPassage->entered_by = Auth::user()->name;
                $newPassage->checked_by = Auth::user()->name;
                //dd($newPassage);
                $newPassage->save();

                $this->showPassageForm = false;
                $this->passagesForm = false;
                $this->passageinfo = false;
                $this->showPlateRow = false;
                $this->showFlaskRow = false;
                 LivewireAlert::title('Passage Info Saved!')->success()->show();
            }

        }
        else {
            LivewireAlert::title('Have your verified the Data?')->warning()->show();
        }

    }
}

<?php

namespace App\Livewire\Ctms\Datareview;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\ModqScore;

//traits
use App\Traits\Base;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class DatarevModqScores extends Component
{
    use Base;
    //Trait binding
    //default modq arrav values
    //Traits
    //Form bindings
  
    //global patient uuid
    public $patient_uuid;
    public $data_type;

    //Errors, Alers, Callouts

    public $Objs;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        //$this->data_type = $data_type;
        $this->Objs = ModqScore::where('patient_uuid', $this->patient_uuid)->get();
        //dd($this->Objs);
    }

    public function render()
    {
        return view('livewire.ctms.datareview.datarev-modq-scores');
    }
}

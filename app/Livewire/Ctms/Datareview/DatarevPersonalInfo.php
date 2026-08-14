<?php

namespace App\Livewire\Ctms\Datareview;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//traits
use App\Traits\Base;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class DatarevPersonalInfo extends Component
{
    
    //Trait binding
    use Base;

    //Form bindings
  
    //global patient uuid
    public $patient_uuid;
    //public $data_type;

    //Errors, Alers, Callouts

    public $Objs, $patientPrimaryInfo;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        //$this->data_type = $data_type;
        $this->Objs = Patient::where('patient_uuid', $this->patient_uuid)->get();

        $this->patientPrimaryInfo = Patient::where('patient_uuid', $this->patient_uuid)->first();
        //dd($this->patient_uuid, $patientPrimaryInfo);
        //dd($this->Objs);
    }

    public function render()
    {
        return view('livewire.ctms.datareview.datarev-personal-info');
    }
}

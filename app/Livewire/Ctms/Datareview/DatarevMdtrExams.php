<?php

namespace App\Livewire\Ctms\Datareview;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Mdtre;

//traits
use App\Traits\Base;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class DatarevMdtrExams extends Component
{
    use Base;
    //Trait binding

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
        $this->Objs = Mdtre::where('patient_uuid', $this->patient_uuid)->get();
        //dd($this->Objs);
    }

    public function render()
    {
        return view('livewire.ctms.datareview.datarev-mdtr-exams');
    }
}

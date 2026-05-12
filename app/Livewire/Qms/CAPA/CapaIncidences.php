<?php

namespace App\Livewire\Qms\CAPA;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Pmc\Division;
use App\Models\Qms\ActionEffectiveCheck;
use App\Models\Qms\CapaDocs;
use App\Models\Qms\Capas;
use App\Models\Qms\CapaReview;
use App\Models\Qms\CapaStatusHistory;
use App\Models\Qms\CorrectiveAction;
use App\Models\Qms\PreventiveAction;

//forms

//traits
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
//use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;
//
use Illuminate\Support\Facades\Log;

class CapaIncidences extends Component
{
    //panels
    public $sys_panel = false, $msg_panel = false;
    Public $p1 = false, $p2 = false, $p3 = false, $p4 = false, $p5 = false;

    //component variables
    public $nc_id = null, $entry = null, $divs;

    //panel openings
    public $openAllOtherForms = false;
    public $newNCEntrySteps = false;
    public $edit_button = false;

    //dashboard variables
    public $open_ncs = null, $icapa = [];

    public function mount($entry)
    {
        //$this->nc_id = $nc_id;
        $this->entry = $entry;
        if($this->entry == "new")
        {
            $this->divs = Division::all();
            $this->icapa['role_raised'] = Auth::user()->roles->pluck('name')[0] ?? '';
            $this->icapa['reported_by'] = Auth::user()->name;
            $this->icapa['capa_status'] = "open";
            $this->icapa['target_date'] = date('Y-m-d', strtotime('+21 days'));
            $this->icapa['closure_date'] = date('Y-m-d', strtotime('+28 days'));
        }

    }

    public function render()
    {
        return view('livewire.qms.c-a-p-a.capa-incidences');
    }

    public function fnSaveNewCAPA()
    {
        //dd("reached for saving");
        
        $newCapa = new Capas();

        $newCapa->capa_uuid  = Str::uuid()->toString();
        $newCapa->capa_origin = $this->icapa['capa_origin'];
        $newCapa->capa_type  = $this->icapa['capa_type'];
        $newCapa->reference_no  = $this->icapa['reference_no']; // if non NC mediated this will have value
        $newCapa->nc_id  = null;
        $newCapa->issue_description  = $this->icapa['description'];
        $newCapa->root_cause  = "Due";
        $newCapa->action_plan  = "Due";
        $newCapa->division_reported = $this->icapa['div_reported'];
        $newCapa->reported_by  = $this->icapa['role_raised'];
        $newCapa->responsible_user_id  = null;
        $newCapa->target_date  = $this->icapa['target_date'];
        $newCapa->closure_date  = $this->icapa['closure_date'];
        $newCapa->capa_status  = $this->icapa['capa_status'];
        //dd($newCapa);
        $newCapa->save();
        

        //reset form fields
        $this->resetCapaFormFields();

        //now dispatch an event to NcHome and close the panel
        $this->msg_panel = true;
        $msg = "New CA-PA Generated";
        
        $this->comSuccess = $msg;
        $this->dispatch('closePanelP1');

        $this->actCapas = Capas::all();
    }

    public function resetCapaFormFields()
    {
        $this->icapa = [];
    }
}

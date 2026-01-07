<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Pmc\Division;
use App\Models\Qms\NCAcks;
use App\Models\Qms\NCAuditTrail;
use App\Models\Qms\NCComms;
use App\Models\Qms\NCReview;
use App\Models\Qms\NCStatusHistory;
use App\Models\Qms\NonConformity;

//traits
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
//use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;
//
use Illuminate\Support\Facades\Log;

class NonConformityIncidences extends Component
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
    public $open_ncs = null, $nc = [];

    public function mount($nc_id, $entry)
    {
        $this->nc_id = $nc_id;
        $this->entry = $entry;
        if($this->entry == "new")
        {
            $this->divs = Division::all();
            $this->nc['role_raised'] = Auth::user()->roles->pluck('name')[0] ?? '';
            $this->nc['reported_by'] = Auth::user()->name;
            $this->nc['nc_status'] = "open";
        }

    }

    public function render()
    {
        return view('livewire.qms.n-c.non-conformity-incidences');
    }

    public function fnSaveNewNC()
    {
        
        /*
        //dd($this->nc);
        $nNc = new NonConformity();

        $nNc->nc_uuid = Str::uuid()->toString();
        $nNc->origin_of_nc = $this->nc['nc_origin'];
        $nNc->division_reported = $this->nc['div_reported_by'];
        $nNc->raised_by = $this->nc['reported_by'];
        $nNc->raised_role = $this->nc['role_raised'];
        $nNc->raised_at = $this->nc['reported_date'];
        $nNc->assigned_division = $this->nc['div_addressed_to'];
        $nNc->description = $this->nc['description'];
        $nNc->current_status = "open";
        $nNc->requires_capa = 'no';
        $nNc->linked_capa_id = null; //decision taken at closure
        //dd($nNc);
        $nNc->save();

        $nNcSH = new NCStatusHistory();
        $nNcSH->nc_id = $nNc->nc_id;
        $nNcSH->from_status = "new";
        $nNcSH->to_status = $nNc->current_status;
        $nNcSH->changed_by = $nNc->raised_by;
        $nNcSH->change_reason = "Fresh Entry";
        $nNcSH->save();

        $nNcAT = new NCAuditTrail();
        $nNcAT->record_type = "Insert";
        $nNcAT->nc_id = $nNc->nc_id;
        $nNcAT->action = "New Insert";
        $nNcAT->old_value = null;
        $nNcAT->new_value = json_encode($nNc->toArray());
        $nNcAT->save();

        //nullify all objects
        $this->resetNcFormFields();

        */
        //now dispatch an event to NcHome and close the panel
        $this->msg_panel = true;
        $msg = "New Non Conformity Generated";
        
        $this->comSuccess = $msg;
        $this->dispatch('closePanelP1');

    }    



    public function resetNcFormFields()
    {
        $this->nc = [];
    }
    

}

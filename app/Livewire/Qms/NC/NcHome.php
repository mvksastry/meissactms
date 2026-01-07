<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Qms\NCAcks;
use App\Models\Qms\NCAuditTrail;
use App\Models\Qms\NCComms;
use App\Models\Qms\NCReview;
use App\Models\Qms\NCStatusHistory;
use App\Models\Qms\NonConformity;

//traits
use Livewire\WithFileUploads;

//
use Illuminate\Support\Facades\Log;

class NcHome extends Component
{
    //panels
    public $sys_panel = false, $msg_panel = false;
    Public $p1 = false, $p2 = false, $p3 = false, $p4 = false, $p5 = false, $p6 =  false;

    //component variables
    public $nc_id = null, $entry = null;

    //panel openings
    public $openAllOtherForms = false;
    public $newNCEntrySteps = false;
    public $edit_button = false;

    //dashboard variables
    public $open_ncs = null;

    public function render()
    {
        return view('livewire.qms.n-c.nc-home');
    }

    public function fnNewNC()
    {
        //dd("reached nc home");
        $this->nc_id = null;
        $this->entry = "new";
        $this->p1 = true;
    }    

    #[On('closePanelP1')] 
    public function resetP1Panel()
    {
        $this->p1 = false;
        //$this->resetMessagePanels();
    }

    public function resetMessagePanels()
    {
        $this->msg_panel = false;
        $this->sys_panel = false;
        
        $this->sysAlertInfo = false;
        $this->sysAlertSuccess = false;
        $this->sysAlertWarning = false;
        $this->sysAlertDanger = false;

        $this->comInfo = false;
        $this->comSuccess = false;
        $this->comDanger = false;
        $this->comWarning = false;
    }
    
}

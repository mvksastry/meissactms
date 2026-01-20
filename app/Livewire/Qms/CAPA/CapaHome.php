<?php

namespace App\Livewire\Qms\CAPA;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Qms\Capas;
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

class CapaHome extends Component
{
    //panels
    public $sys_panel = false, $msg_panel = false;
    Public $p1 = false, $p2 = false, $p3 = false, $p4 = false, $p5 = false, $p6 =  false;

    //dashboard variables
    public $open_ncs = null, $actCapas;

    public function render()
    {
        $this->actCapas = Capas::all();
        //dd($this->actCapas);
        return view('livewire.qms.c-a-p-a.capa-home');
    }

    public function fnNewCAPA()
    {
        dd("reached capa home");
        $this->nc_id = null;
        $this->entry = "new";
        $this->p1 = true;
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

    public function fnCAPADetails($nc_id)
    {
        $this->nc_id = $nc_id;
        
        //$this->nc_communs = NCComms::where('nc_id', $nc_id)->get();
        //$this->nc_review = NCReview::where('nc_id', $nc_id)->get();
        //$this->nc_history =  NCStatusHistory::where('nc_id', $nc_id)->get();
        //$this->nc_auditLogs = NCAuditTrail::where('nc_id', $nc_id)->get();
        //dd($this->nc_acks, $this->nc_communs, $this->nc_review, $this->nc_history, $this->nc_auditLogs);
        $this->allNcPanels = true;
    }
}

<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Qms\NCAcks;
use App\Models\Qms\NCAuditTrail;
//use App\Models\Qms\NCComms;
//use App\Models\Qms\NCReview;
use App\Models\Qms\NCStatusHistory;
//use App\Models\Qms\NonConformity;

class NcAcknowledges extends Component
{
    public $nc_id, $entry, $nc_acks;

    public $ncAck = [], $ack_by, $remarks;

    public function mount($nc_id)
    {
        $this->ncAck = [];
        $this->nc_id = $nc_id;
        $this->ncAck['ack_by'] = Auth::user()->name;
        //$this->entry = $entry;
        $this->setAckComponent();
       
    }

    public function setAckComponent()
    {
        //dd($this->nc_id);
        $this->nc_acks = NCAcks::where('nc_id', $this->nc_id)->get();
        //dd($this->nc_acks);
    }

    public function render()
    {
        return view('livewire.qms.n-c.nc-acknowledges');
    }

    public function fnAckNCevent()
    {
        //dd("reached for saving nc");
        $ackNc = new NCAcks();
        $ackNc->nc_id = $this->nc_id;
        $ackNc->ack_by = Auth::user()->name;
        $ackNc->role_entered = Auth::user()->roles->pluck('name')[0] ?? '';
        $ackNc->remarks = $this->ncAck['remarks'];
        //dd($ackNc);
        $ackNc->save();

        
        $nNcSH = new NCStatusHistory();
        $nNcSH->nc_id = $nNc->nc_id;
        $nNcSH->from_status = "new";
        $nNcSH->to_status = $nNc->current_status;
        $nNcSH->changed_by = $nNc->raised_by;
        $nNcSH->change_reason = "Fresh Entry";
        $nNcSH->save();
        

        $nNcAT = new NCAuditTrail();
        $nNcAT->record_type = "Insert";
        $nNcAT->nc_id = $this->nc_id;
        $nNcAT->action = "Acknowledged NC ID-".$this->nc_id;
        $nNcAT->old_value = null;
        $nNcAT->new_value = json_encode($ackNc->toArray());
        $nNcAT->save();

        //nullify all objects
        $this->ncAck = [];
    }
}

<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
//use App\Models\Qms\NCAcks;
//use App\Models\Qms\NCAuditTrail;
//use App\Models\Qms\NCComms;
use App\Models\Qms\NCReview;
//use App\Models\Qms\NCStatusHistory;
//use App\Models\Qms\NonConformity;

class NcReviews extends Component
{
    public $nc_id, $entry, $nc_acks;

    public $nc_review;

    public function mount($nc_id)
    {
        $this->nc_id = $nc_id;
        //$this->ncAck['ack_by'] = Auth::user()->name;
        //$this->entry = $entry;
        $this->setAckComponent();
       
    }

    public function setAckComponent()
    {
        //dd($this->nc_id);
        $this->nc_review = NCReview::where('nc_id', $this->nc_id)->get();
        //dd($this->nc_acks);
    }

    public function render()
    {
        return view('livewire.qms.n-c.nc-reviews');
    }
}

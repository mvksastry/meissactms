<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Qms\NCComms;


class NcCommunications extends Component
{
    public $nc_id, $entry, $nc_acks;

    public $ncComs = [];

    public $nc_communs;

    public function mount($nc_id)
    {
        $this->nc_id = $nc_id;
        $this->ncComs['ack_by'] = Auth::user()->name;
        //$this->entry = $entry;
        $this->setAckComponent();
    }

    public function setAckComponent()
    {

        $this->nc_communs = NCComms::where('nc_id', $this->nc_id)->get();

    }

    public function render()
    {
        return view('livewire.qms.n-c.nc-communications');
    }
}

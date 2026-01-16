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
        $this->ncComs['entered_by'] = Auth::user()->name;
        //$this->entry = $entry;
        $this->setComComponent();
    }

    public function setComComponent()
    {
        $this->nc_communs = NCComms::where('nc_id', $this->nc_id)->get();
    }

    public function render()
    {
        return view('livewire.qms.n-c.nc-communications');
    }

    public function fnNCCommunications()
    {
        //dd("for posting reached");
        $input = $this->ncComs;
        //dd($input);
        $nEntCom = new NCComms();
        $nEntCom->nc_id = $this->nc_id;
        $nEntCom->message_type = $input['message_type'];
        $nEntCom->message = $input['message'];
        $nEntCom->entered_by = $input['entered_by'];
        $nEntCom->entered_role = Auth::user()->roles->pluck('name')[0] ?? '';
        $nEntCom->visible_to = $input['visible_to'];
        //dd($nEntCom);
        $nEntCom->save();
        //empty form
        $this->ncComs = [];
        $this->setComComponent();
    }

}

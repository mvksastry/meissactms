<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
//use App\Models\Qms\NCAcks;
use App\Models\Qms\NCAuditTrail;
//use App\Models\Qms\NCComms;
//use App\Models\Qms\NCReview;
//use App\Models\Qms\NCStatusHistory;
//use App\Models\Qms\NonConformity;

class NcAuditLogs extends Component
{
    public $nc_id, $entry;

    public $nc_auditLogs;

    public function mount($nc_id)
    {
        $this->nc_id = $nc_id;

        $this->setAckComponent();
       
    }

    public function setAckComponent()
    {
        $this->nc_auditLogs = NCAuditTrail::where('nc_id', $this->nc_id)->get();
    }

    public function render()
    {
        return view('livewire.qms.n-c.nc-audit-logs');
    }
}

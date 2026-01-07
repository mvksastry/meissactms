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

class NonConformityIncidences extends Component
{
    public function render()
    {
        return view('livewire.qms.n-c.non-conformity-incidences');
    }
}

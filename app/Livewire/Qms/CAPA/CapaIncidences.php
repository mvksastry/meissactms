<?php

namespace App\Livewire\Qms\CAPA;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
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

//
use Illuminate\Support\Facades\Log;

class CapaIncidences extends Component
{
    public function render()
    {
        return view('livewire.qms.c-a-p-a.capa-incidences');
    }
}

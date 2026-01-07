<?php

namespace App\Livewire\Qms\RCA;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Qms\RcaReview;
use App\Models\Qms\RootCauseAnalysis;
use App\Models\Qms\WhyStep;

//forms

//traits
use Livewire\WithFileUploads;

//
use Illuminate\Support\Facades\Log;

class RootCauseResolution extends Component
{
    public function render()
    {
        return view('livewire.qms.r-c-a.root-cause-analysis');
    }
}

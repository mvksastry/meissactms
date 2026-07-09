<?php

namespace App\Livewire\Egov;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activities;
use App\Models\User;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CtmsActivities extends Component
{
    public $message = null;

    //panels/forms
    public $viewCreateActivityForm = false;

    //form variables
    public $activities;

    public function render()
    {
        $this->activities = Activities::where('status','active')->get();

        return view('livewire.egov.ctms-activities');
    }
}

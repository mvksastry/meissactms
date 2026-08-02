<?php

namespace App\Livewire\Egov;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activity;
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
        $this->activities = Activity::with('incharge')->with('leader')->where('status','active')->get();

        return view('livewire.egov.ctms-activities');
    }

    public function selectedActivityId($activityId)
    {
        $this->message = "Selected Activity ID: ".$activityId;
        LivewireAlert::title('Activity Selected')->info()->asToast()->show();
    }

    public function fnEndActivity()
    {
        $this->message = "Ending Activity";
        LivewireAlert::title('Ending Activity')->info()->asToast()->show();
    }
}

<?php

namespace App\Livewire\Egov;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activity;
use App\Models\Ctms\Patient;
use App\Models\User;
use App\Models\Ctms\Decisions\Enrollment;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TCtms\TActivityQueries;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Validator;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Validation of product form
use App\Livewire\Forms\Activities\CreateActivityForm;

class EndCtmsActivity extends Component
{
    //panels/forms
    public $p1 = false, $p2 = false;

    //form variables
    public $activities, $ctms_activity_selected, $cas_obj, $users, $patients, $enrolmsg = false;
    public $description, $close;

    public function render()
    {
        $this->activities = Activity::with('incharge')->with('leader')->where('status','active')->get();
        return view('livewire.egov.end-ctms-activity');
    }
}

<?php

namespace App\Livewire\Egov;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activities;
use App\Models\User;

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



class CreateNewActivity extends Component
{
    //form bindings
    public CreateActivityForm $form;

    public $message = null;

    //panels/forms
    public $viewCreateActivityForm = false;

    //form variables
    public $allActivities = [], $users;

    public function render()
    {
        $this->users = User::all();

        return view('livewire.egov.create-new-activity');
    }

    public function fnPostCreateActivityInfo()
    {
        //dd("reached");
        LivewireAlert::title('Processing...')->info()->asToast()->show();
        $this->validate();
        $input = $this->form->all();
        //dd($input);
        //set status and status dates
        $input['status'] = 'active';
        $input['status_date'] = date('Y-m-d');

        $result = Activities::create($input);

        if($result)
        {
            LivewireAlert::title('Activity Created')->success()->asToast()->show();
            $msg = 'User ['.Auth::user()->name.'] saved New Activity Data';
        } else {
            LivewireAlert::title('Activity NOT Created')->warning()->asToast()->show();
            $msg = 'User ['.Auth::user()->name.'] Could not save New Activity Data';
            
        }
        $this->form->reset();
        $input = null;
        Log::channel('patient')->info($msg);
        return $this->redirect('/ctms-core-activities');
        
    }
}

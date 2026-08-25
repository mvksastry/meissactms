<?php

namespace App\Livewire\Ctms\Patients\Onboarding;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
//forms
use App\Livewire\Forms\PatientOnboardingForm;

//traits
use App\Traits\Base;
use App\Traits\TCtms\TPatientPersonalInfo;
use App\Traits\TCtms\TPatientDuplicateCheck;
//use App\Traits\TCtms\TDbEntries;
use App\Traits\TCtms\TPatientOnboardInfo;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//logs
use Illuminate\Support\Facades\Log;

class PatientOnboardingSubmission extends Component
{
    use Base;
    use TPatientDuplicateCheck;
    use TPatientPersonalInfo;
    //use TDbEntries;
    use TPatientOnboardInfo;

    //Form bindings
    public PatientOnboardingForm $form;

    //primary information of forms
    public $patient_id, $patient_uuid; 
    public $center_id, $ctarm_id;
    public $name, $gender, $date_of_birth, $age, $primary_phone_number;

    public $comment_entered_by, $entered_by, $entry_date;

    public function mount()
    {   
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.ctms.patients.onboarding.patient-onboarding-submission');
    }

    public function updated($date_of_birth, $value): void
    {
        if ($date_of_birth === 'form.date_of_birth') {
            $this->form->age = $this->getAgeFromDoB($value);
        }
    }

    //this function only save the first two tabs of information
    //creates all the 24 dbs just like before but after approval.
    //decoupling has to be done from direct entries like before
    public function fnSavePrimaryInfo()
    {
        
        $this->form->validate(); 
        $this->input = $this->form->all();
        $this->input = $this->sanitizeInput($this->input);
        //dd($this->input);
        if($this->getDuplicateEntries($this->input))
        {
            $msg = 'Cannot Save as Matching Name, gender, primary phone number for ['.$this->input['name'].'] found ';
            LivewireAlert::title('Duplicate Entry Found...')->warning()->asToast()->show();
            Log::channel('patient')->info($msg);
        } else {
            $this->input['age'] = $this->getAgeFromDoB($this->input['date_of_birth']);
            $result = $this->savePatientOnBoardingInformation($this->input);
            LivewireAlert::title('Patient On-Boarding ['.$result.'] Data Saved...')->info()->asToast()->show();
            $msg = 'User ['.Auth::user()->name.'] Saved On-Boarding Patient information for ['.$result.']';
            Log::channel('patient')->info($msg);
            //dd($result);
        }
        
    }
}

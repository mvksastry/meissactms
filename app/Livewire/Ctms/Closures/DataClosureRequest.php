<?php

namespace App\Livewire\Ctms\Closures;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;



//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Logging
use Illuminate\Support\Facades\Log;

class DataClosureRequest extends Component
{

    public $patient_uuid;
    public $patientInfo;
    public $enrollInfo;

    public $initiated_by;
    public $date_initiated;
    public $form = [
        'closure_comment' => null,
        'initiated_by' => null,
        'date_initiated' => null,
    ];

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
        $this->patientInfo = Patient::where('patient_uuid', $this->patient_uuid)->first();
        $this->enrollInfo = Enrollment::where('patient_uuid', $this->patient_uuid)->first();
        $this->form['initiated_by'] = auth()->user()->name; // Assuming you want to set the initiated_by to the current user's name
        $this->form['date_initiated'] = now()->toDateString(); // Set the current date
    }

    public function render()
    {
        return view('livewire.ctms.closures.data-closure-request');
    }

    public function initiateDataClosure()
    {
        //dd("reached closure function");
        // Logic to initiate data closure
        // For example, you might want to update the patient's status or create a closure record
        // You can also add validation and error handling as needed
        $this->patientInfo->status_code = 430;
        $this->patientInfo->closure_code = 430; // Example closure code

        $this->patientInfo->appendComment('closure_comment', $this->form['closure_comment']);
        $this->patientInfo->closed_by = $this->form['initiated_by'];
        $this->patientInfo->date_closed = $this->form['date_initiated'];

        // Example: Update patient status to 'closure_initiated'
        $this->patientInfo->status = 'closed';
        $this->patientInfo->status_date = $this->form['date_initiated'];
        //dd($this->patientInfo);
        $this->patientInfo->save();

        $this->resetValues(); // Reset the form values after submission
        // Optionally, you can emit an event or redirect to another page
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Initiated Data Closure for Patient [ '.$this->patientInfo->patient_uuid.' ]');
        LivewireAlert::title("Closure Request Initiated")->success()->show();
        $this->dispatch('closeP1P2'); // Emit the event to close panels P1 and P2
    }   

    
    public function completePatientDataClosure()
    {
        // Logic to complete patient data closure
        // For example, you might want to update the patient's status to 'closed'
        $patient = Patient::where('patient_uuid', $this->patient_uuid)->first();

        if ($patient) {
            $patient->status_code = 440; // Update the status code to indicate closure completed
            $patient->closure_code = 440; // Update the closure code to indicate closure completed
            $patient->status = 'exited'; // Update the status to 'exited' or any other appropriate status
            $patient->status_date = now()->toDateString(); // Update the status date to the current date
            $patient->appendComment('closure_comment', $this->form['closure_comment']);
            $patient->closure_auth_by = $this->form['initiated_by'];
            $patient->closure_auth_date = $this->form['date_initiated'];
            $patient->final_status = 'exited'; // Update the final status to 'closed' or any other appropriate status
            //dd($patient);
            $patient->save();

            // Optionally, you can emit an event or redirect to another page
            $this->resetValues(); // Reset the form values after submission
            Log::channel('patient')->info('User [ '.Auth::user()->name.' ] Completed Data Closure for Patient [ '.$this->patient_uuid.' ]');
            LivewireAlert::title("Closure Completed")->success()->show();
            $this->dispatch('closeP1P2'); // Emit the event to close panels P1 and P2
        } else {
            LivewireAlert::title("Error: Patient ID Invalid")->error()->show();
        }
    }

    public function resetValues()
    {
        // This method will be called whenever any property in the $form array is updated
        // You can add any additional logic here if needed
        $this->form['closure_comment'] = null;
        $this->form['initiated_by'] = null; // Reset to current user's name
        $this->form['date_initiated'] = null;
    }
}

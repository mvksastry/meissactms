<?php

namespace App\Livewire\Ctms\Closures;

use Livewire\Component;

use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;





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

    public function mount($uuid)
    {
        $this->patient_uuid = $uuid;
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
        dd("reached closure function");
        // Logic to initiate data closure
        // For example, you might want to update the patient's status or create a closure record
        // You can also add validation and error handling as needed

        // Example: Update patient status to 'closure_initiated'
        $this->patientInfo->status = 'closure_initiated';
        $this->patientInfo->save();

        // Optionally, you can emit an event or redirect to another page
        session()->flash('message', 'Data closure initiated successfully.');
    }   


}

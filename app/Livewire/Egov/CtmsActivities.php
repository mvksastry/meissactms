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

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

//Validation of product form
use App\Livewire\Forms\Activities\CreateActivityForm;

//traits
use App\Traits\TCtms\TActivityQueries;

class CtmsActivities extends Component
{
    use TActivityQueries;

    //form bindings
    public CreateActivityForm $form;

    public $message = null;

    //panels/forms
    public $viewCreateActivityForm = false;
    public $p1 = false, $p2 = false;

    //form variables
    public $activities, $ctms_activity_selected, $cas_obj, $users, $patients, $enrolmsg = false;
    public $description, $close;

    public function render()
    {
        $this->activities = Activity::with('incharge')->with('leader')->where('status','active')->get();

        return view('livewire.egov.ctms-activities');
    }

    public function fnEndActivity()
    {
        $this->message = "Ending Activity";
        LivewireAlert::title('Ending Activity')->info()->asToast()->show();
    }

    public function fnEditCtmsActivityById($ctms_activity_id)
    {
        $this->ctms_activity_selected = $ctms_activity_id;
        $this->message = "Selected Activity ID: ".$ctms_activity_id;
        LivewireAlert::title($this->message)->info()->asToast()->show();
        $this->users = User::all();
        $this->patients = $this->patients = Patient::pluck('name','patient_uuid')->toArray();
        $this->cas_obj = Activity::with('incharge')->with('leader')->where('status','active')->first();
        //dd($this->cas_obj);
        $this->setFormDataForEdit();
        $this->p1 = true;
    }

    public function setFormDataForEdit()
    {
        $this->form->incharge_id = $this->cas_obj->incharge_id;
        $this->form->leader_id = $this->cas_obj->incharge_id;
        $this->form->description = $this->cas_obj->description;
        $this->form->patient_uuid = $this->cas_obj->patient_uuid;
        $this->form->code = $this->cas_obj->code;
        $this->form->approval_ref = $this->cas_obj->approval_ref;
        $this->form->date_approved = $this->cas_obj->date_approved;
        $this->form->start_date = $this->cas_obj->start_date;
        $this->form->end_date = $this->cas_obj->end_date;
        $this->form->budget_total = $this->cas_obj->budget_total;
        $this->form->budget_equipment = $this->cas_obj->budget_equipment;
        $this->form->budget_consumable = $this->cas_obj->budget_consumable;
        $this->form->budget_contigency = $this->cas_obj->budget_contigency;
        $this->form->activity_file = $this->cas_obj->activity_file;
        $this->form->sanction_file = $this->cas_obj->sanction_file;
        $this->form->notes = $this->cas_obj->notes;

        $this->form->budget_consumable = $this->cas_obj->budget_consumable;
        $this->form->budget_contigency = $this->cas_obj->budget_contigency;
        $this->form->activity_file = $this->cas_obj->activity_file;
        $this->form->sanction_file = $this->cas_obj->sanction_file;
        $this->form->notes = $this->cas_obj->notes;
    }

    public function fnPostEditActivityInfo()
    {
        $input = $this->form->all();
        $this->validate();
        $enrollstatus = $this->checkEnrollmentCurrentStatusById($input['patient_uuid']);

        if($enrollstatus)
        {
            LivewireAlert::title("Cannot Close, as Patient status current ")->warning()->show();
            return;
        }else {
            //first ask question, is it going for closure
            if($this->form->close)
            {
                //set status and status dates
                $input['status'] = 'closed';
                $input['status_date'] = date('Y-m-d');
                $input['entered_by'] = Auth::user()->name;
                $input['entry_date'] = date('Y-m-d');

                $result = Activity::where('patient_uuid', $input['patient_uuid'])->update($input);
                if($result){
                    LivewireAlert::title("Patient stattus not current, can close")->info()->show();
                }else {
                    LivewireAlert::title("Cannot Close DB Error - contact admin")->warning()->show();
                }
                

            }
        }

        
    }

    public function fnCancelEditInfo()
    {
        $this->cas_obj = null;
        $this->p1 = false;
    }
}

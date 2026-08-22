<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;

//forms

//traits
use Livewire\WithFileUploads;
//use App\Traits\TCtms\TDbEntries;
use App\Traits\TCtms\TDbEntriesRevised;
use App\Traits\TCtms\TPatientTimeline;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//
use Illuminate\Support\Facades\Log;

class ManagePatients extends Component
{
    use WithFileUploads;
    //use TDbEntries;
    use TDbEntriesRevised;
    use TPatientTimeline;

    //form status
    public $data_type = null;

    //new paitent global uuid
    public $patient_uuid, $entry="update";
    public $highlightedId;

    //Form openings
    public $p10 = false;
    public $p11 = false; //on-boarding panel specific to ctms-incharge
    public $p12 = false; //on-boarding data entered etc.

    //variables
    public $aadhar_id, $pan_num, $other_id, $report_dateope, $dicharge_rep_file;
    public $opd_id, $ipd_id, $admission_date, $form_header;

    //login credentials
    public $entered_by, $entry_date, $approval;

    //modals and callouts.

    //public variable for checking status incomplete status
    public $patient_data_status, $ob_patient_data_status, $patientPrimaryInfo, $obpInfo;

    //onboarding approval variables
    public $formx, $ob_approved_by, $ob_approval_comment; 

    public function render()
    {    
        $this->entered_by = Auth::user()->name;
        $this->logged_user = Auth::user()->name;
        $this->entry_date = date('Y-m-d');

        if(Auth::user()->hasAnyRole(['ctms_incharge']))
        {
            $this->ob_patient_data_status = Patient::where('ob_status','pending')
                                                    ->where('status', null)->get();
        }
 
        if(Auth::user()->hasAnyRole(['director']))
        {
            $this->ob_patient_data_status = Patient::where('ob_status','pending')
                                                    ->where('status', null)->get();
        }     
        return view('livewire.ctms.patients.manage-patients');
    }


    //main panel opening only
    public function fnOnBoarding()
    {
        $this->form_status = "new";
        $this->p11 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown New On-Boarding Form');
    }

    public function fnResetAllVisiblePanels()
    {
        $this->p10 = false;
        $this->p11 = false;
        $this->p12 = false;
        $this->p13 = false;
    }

    //--- UI related code ends here ---//

    public function patientDetailsForOnBoarding($id)
    {
        //dd($id);
        //dd("reached onboard details");
        $this->patient_uuid = $id;
        $this->patientPrimaryInfo = Patient::where('patient_uuid', $this->patient_uuid)
                                            ->where('ob_status','pending')->first();
                                    
        //dd($id, $this->patientPrimaryInfo);
        //dd($this->patientPrimaryInfo);
        if(Auth::user()->hasAnyRole(['ctms_incharge']))
        {
            $this->p10 = true;
        }
 
        if(Auth::user()->hasAnyRole(['director']))
        {
            $this->p12 = true;
        }
    }

    public function fnAccordOnboardPermission($patient_uuid)
    {
        if($this->approval == 1)
        {

        $this->obpInfo = Patient::where('patient_uuid', $patient_uuid)
                                    ->where('ob_status','pending')
                                    ->first();
        //dd($this->obpInfo);
        //dd("reached", $patient_uuid);
        //we are now reached the final decision by director
        // 1. object obtained. // we need to make 4 changes to this object
        //
        //on boarding decisions
        $this->obpInfo->ob_approved_by = Auth::user()->name;
        $this->obpInfo->ob_approval_role = Auth::user()->roles->pluck('name')[0];
        //pd$this->obpInfo->ob_approval_comment = $this->ob_approval_comment;
        $this->obpInfo->appendComment('ob_approval_comment', $this->ob_approval_comment);

        $this->obpInfo->ob_status = 'completed';

        //now global falg till end of patient life cycle
        $this->obpInfo->status_code = 160; // is defined as pre-enrollment stage
        $this->obpInfo->status = 'draft';
        $this->obpInfo->status_date = date('Y-m-d');

        //dd($this->obpInfo);
        $this->obpInfo->save();
        //with the above everything is complete.

        $data_type = "pre-enrollment"; //get the value from config keys.

        //now we need to (i)update Patients table and create db entries in all 24 tables.
        $result = $this->setAllDbPatientDataModels($patient_uuid, $this->obpInfo, $data_type);

        //timeline entries
        $name = $patient_uuid;
        $event = "Patient Received On-Boarding Approval";
        $tl_msg = $this->ob_approval_comment;
        $resx = $this->savePatientTimeline($patient_uuid, $name, $event, $tl_msg);

        $event = "Patient DBs initiated";
        $resx = $this->savePatientTimeline($patient_uuid, $name, $event, $tl_msg);

        LivewireAlert::title('Approval Step Success')->success()->show();
        $this->fnResetAllVisiblePanels();
        }else{
            LivewireAlert::title('Approval Kept In Pending State')->warning()->show();
        }
    }

}

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

//
use Illuminate\Support\Facades\Log;

class ManagePatients extends Component
{
    use WithFileUploads;

    //form status
    public $form_status = null;
    public $openAllOtherForms = false;
    public $showPrimaryInfo = true;

    //new paitent global uuid
    public $patient_uuid, $entry="update";

    //panel definitions
    public $newPatientEntrySteps = false;
    public $newClinicalInvestigationsEntrySteps = false;


    //Errors, Alers, Callouts
    public $sys_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $msg_panel = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    //state of panel on or off
    public $stateOfNewPatientEntrySteps = "off";

    //Form openings
    public $p1 = false;
    public $p2 = false;
    public $p3 = false;
    public $p4 = false;
    public $p5 = false;
    public $p6 = false;

    public $p7 = false;
    public $p8 = false;
    public $p9 = false;
    public $p10 = false;
    
    //variables
    public $aadhar_id, $pan_num, $other_id, $report_dateope, $dicharge_rep_file;
    public $opd_id, $ipd_id, $admission_date, $form_header;

    //edit route if user wants
    public $edit_button = false;

    //image upload related
    public $image_category = null;
    public $uploadImage = false;
    public $imageInputFile;

    //login credentials
    public $entered_by;

    //modals and callouts.

    //public variable for checking status incomplete status
    public $patient_data_status;

    //logged user
    public $logged_user;

    public function render()
    {    
        $this->entered_by = Auth::user()->name;
        $this->logged_user = Auth::user()->name;
        $this->patient_data_status = Patient::where('status','draft')->get();
        
        if(count($this->patient_data_status) > 0)
        {
            $this->msg_panel = true;
            $sysAlertWarning = false;
            $this->comWarning = "Draft' status Patients Found: Wish To Complete?";
            //show button for edit test it
            $this->edit_button = true;
            // Log info message
            Log::channel('patient')->info('Patients with draft status found');
        }       
        return view('livewire.ctms.patients.manage-patients');
    }

    public function fnRedirectToEdit()
    {
        Log::channel('patient')->info('User [ '.$this->logged_user.' ] Redirected to Edit Patients');
        $this->redirect(EditPatients::class);
    }
    //--- UI related code only ---//

    //main panel opening only
    public function fnNewPatientEntrySteps()
    {
        //reset and show
        $this->form_status = "new";
        $this->newPatientEntrySteps = false;

        //show now.
        $this->newPatientEntrySteps = true;
    }

    #[On('resetPanelsForNewMessages')] 
    public function resetMessagePanels()
    {
        $this->msg_panel = false;
        $this->sys_panel = false;
        
        $this->sysAlertInfo = false;
        $this->sysAlertSuccess = false;
        $this->sysAlertWarning = false;
        $this->sysAlertDanger = false;

        $this->comInfo = false;
        $this->comSuccess = false;
        $this->comDanger = false;
        $this->comWarning = false;
    }

    #[On('newPatientUuidGenerated')] 
    public function setPatientUuid($id)
    {
        $this->patient_uuid = $id;
        $this->resetMessagePanels();

        $this->msg_panel = true;
        $this->comSuccess = "New Patient ID [ '.$id.' ] Created";
        Log::channel('patient')->info($this->comSuccess);
        //dd("event emitted and understood");
        $this->showPrimaryInfo = false;
        $this->openAllOtherForms = true;
    }

    //respective forms
    public function fnShowPrimaryInfoForm()
    {
        $this->fnResetAllVisiblePanels();
        $this->p1 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown New Patient Dashboard');
    }

    public function fnShowPrimaryInfoMesage()
    {
        $this->msg_panel = true;
        $this->comWarning= "Patient Primary Info cannot be re-entered, Use Edit option";
        Log::channel('patient')->info($this->comWarning);
    }

    public function fnLifeStyle()
    {
        $this->fnResetAllVisiblePanels();
        $this->p2 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Life Style Dashboard');
    }

    public function fnClinicalInvestigations()
    {
        $this->fnResetAllVisiblePanels();
        $this->p3 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Clinical Invest Dashboard');
    }

    public function fnSensoryExaminations()
    {
        $this->fnResetAllVisiblePanels();
        $this->p4 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Sensory Exam Dashboard');
    }

    public function fnMDTRExaminations()
    {
        $this->fnResetAllVisiblePanels();
        $this->p5 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Sensory Exam Dashboard');
    }

    public function fnRadiographs()
    {
        $this->fnResetAllVisiblePanels();
        $this->p6 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Radiograph Dashboard');
    }


    public function fnUploadXrayImage()
    {
        $this->image_category = null;
        $this->image_category = "X-Ray";
        $this->uploadImage = true;
        //dd("Xray reached");
    }

    public function fnUploadCTScanImage()
    {
        $this->image_category = null;
        $this->image_category = "CT-Scan";
        $this->uploadImage = true;
        //dd("CTS reached");
    }

    public function fnUploadUSGImage()
    {
        $this->image_category = null;
        $this->image_category = "USG";
        $this->uploadImage = true;
        //dd("USG reached");
    }

    public function fnUploadMRIImage()
    {
        $this->image_category = null;
        $this->image_category = "MRI";
        $this->uploadImage = true;
        //dd("MRI reached");
    }

    public function uploadSelectedImage()
    {
        dd("image upload reached");
    }

    public function fnModifiedPfirmannGrades()
    {
        $this->fnResetAllVisiblePanels();
        $this->p7 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown Pfirmann Dashboard');
    }

    public function fnVisualAnalogScore()
    {
        $this->fnResetAllVisiblePanels();
        $this->p8 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown VA Score Dashboard');
    }

    public function fnMODIQScore()
    {
        $this->fnResetAllVisiblePanels();
        $this->p9 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown MODQ Score Dashboard');
    }

    public function fnRMQScore()
    {
        $this->fnResetAllVisiblePanels();
        $this->p10 = true;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown RMQ Score Dashboard');
    }

    public function fnResetAllVisiblePanels()
    {
        $this->p1 = false;
        $this->p2 = false;
        $this->p3 = false;
        $this->p4 = false;
        $this->p5 = false;
        $this->p6 = false;
        $this->p7 = false;
        $this->p8 = false;
        $this->p9 = false;
        $this->p10 = false;
    }

    //--- UI related code ends here ---//




}

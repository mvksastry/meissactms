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

    //new paitent global uuid
    public $patient_uuid;

    //panel definitions
    public $newPatientEntrySteps = false;
    public $newClinicalInvestigationsEntrySteps = false;


    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess = false, $sysAlertWarning = false, $sysAlertInfo = false, $sysAlertDanger = false;
    public $comDanger = false, $comWarning = false, $comInfo = false, $comSuccess = false;

    //state of panel on or off
    public $stateOfNewPatientEntrySteps = "off";

    //Form openings
    public $openNewPatientEntryForm = false;
    public $openNewLifeStyleEntryForm = false;
    public $openNewClinicalInvestigationsEntryForm = false;
    public $openNewSensoryExaminationsEntryForm = false;
    public $openMDTREExaminationsEntryForm = false;
    public $openRadiographsEntryForm = false;

    public $openModifiedPfirmannGradesEntryForm = false;
    public $openVisualAnalogScore = false;
    public $openMODIQScoreEntryForm = false;
    public $openRMQScoreEntryForm = false;
    public $openAdverseEventsEntryForm = false;
    
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
            $this->message_panel = true;
            $sysAlertWarning = true;
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
        $this->message_panel = false;

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

        $this->messge_panel = true;
        $this->comSuccess = "New Patient ID [ '.$id.' ] Created";
        Log::channel('patient')->info($this->comSuccess);
        //dd("event emitted and understood");
        $this->openAllOtherForms = true;
    }

    //respective forms
    public function fnShowPrimaryInfoForm()
    {
        //close all other open forms
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; // 5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;
        Log::channel('patient')->info('User [ '.Auth::user()->name.' ] shown New Patient Dashboard');
        //open the form 
        $this->openNewPatientEntryForm = true; // 1
        //dd("reached");
    }

    public function fnLifeStyle()
    {
        $this->openNewLifeStyleEntryForm = false;
        //close all other open forms
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewClinicalInvestigationsEntryForm = false; //3
        $this->openNewSensoryExaminationsEntryForm = false; //4
        $this->openMDTREExaminationsEntryForm = false; //5
        $this->openRadiographsEntryForm = false; // 6
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;
        //open the form 
        $this->openNewLifeStyleEntryForm = true;
        //dd("reached");
    }

    public function fnClinicalInvestigations()
    {
        //close all other open forms
        $this->openNewPatientEntryForm = false; //1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;
        //open the form 
        //dd("reached");
        $this->openNewClinicalInvestigationsEntryForm = true; //2
    }

    public function fnSensoryExaminations()
    {
        //close all other open forms
        $this->openNewPatientEntryForm = false; //1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;

        //open the form 
        //dd("reached");
        $this->openNewSensoryExaminationsEntryForm = true; //3
    }

    public function fnMDTRExaminations()
    {
        //dd("reached");
        $this->openNewPatientEntryForm = false; //1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;

        $this->openMDTREExaminationsEntryForm = true; //5
    }

    public function fnRadiographs()
    {
        //dd("reached");
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;

        $this->openRadiographsEntryForm = true; //5
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
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5

        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;

        //dd("MPGrades reached");
        $this->openModifiedPfirmannGradesEntryForm = true;
    }

    public function fnVisualAnalogScore()
    {
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;

        $this->openVisualAnalogScore = true;
    }

    public function fnMODIQScore()
    {
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;

        $this->openMODIQScoreEntryForm = true;
    }

    public function fnRMQScore()
    {
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        
        $this->openAdverseEventsEntryForm = false;

        $this->openRMQScoreEntryForm = true;
    }

    public function fnAdverseEvents()
    {
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        
        $this->openAdverseEventsEntryForm = true;
    }

    public function fnResetAllVisiblePanels()
    {
        $this->openNewPatientEntryForm = false; // 1
        $this->openNewLifeStyleEntryForm = false;
        $this->openNewClinicalInvestigationsEntryForm = false; //2
        $this->openNewSensoryExaminationsEntryForm = false; //3
        $this->openMDTREExaminationsEntryForm = false; //4
        $this->openRadiographsEntryForm = false; //5
        $this->openModifiedPfirmannGradesEntryForm = false;
        $this->openVisualAnalogScore = false;
        $this->openMODIQScoreEntryForm = false;
        $this->openRMQScoreEntryForm = false;
        $this->openAdverseEventsEntryForm = false;
    }

    //--- UI related code ends here ---//






}

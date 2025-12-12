<?php

namespace App\Livewire\Ctms\Patients;

use Livewire\Component;


use Livewire\WithFileUploads;

class ManagePatients extends Component
{
    use WithFileUploads;

    //panel definitions
    public $newPatientEntrySteps = false;
    public $newClinicalInvestigationsEntrySteps = false;

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
    public $aadhar_id, $pan_num, $other_id, $report_date, $dicharge_rep_file;

    //Errors, Alers, Callouts
    public $message_panel = false;
    public $sysAlertSuccess, $sysAlertWarning, $sysAlertInfo, $sysAlertDanger;

    //image upload related
    public $image_category = null;
    public $uploadImage = false;
    public $imageInputFile;

    //modals and callouts.


    public function render()
    {    
        return view('livewire.ctms.patients.manage-patients');
    }

    //--- UI related code only ---//

    //main panel opening only
    public function fnNewPatientEntrySteps()
    {
        //reset and show
        $this->newPatientEntrySteps = false;

        //show now.
        $this->newPatientEntrySteps = true;
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

        //open the form 
        $this->openNewPatientEntryForm = true; // 1
        //dd("reached");
    }

    public function fnLifeStyle()
    {
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

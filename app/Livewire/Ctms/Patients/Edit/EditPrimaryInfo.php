<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Livewire\Forms\PatientForm;

use App\Models\Ctms\Patient;

class EditPrimaryInfo extends Component
{
    //uuid of the patient
    public $uuid;

    //Form bindings
    public PatientForm $form;

    //Object to view
    public $patientPrimaryInfo;

   //primary information 
    public $patient_id, $patient_uuid; 
    public $center_id, $ctarm_id, $opd_id, $in_patient_id, $admission_date;
    public $name, $nick_name, $alias_name, $gender, $date_of_birth, $age, $occupation, $primary_phone_number, $alternate_phone_number;
    public $emergency_contact_name, $emergency_contact_phone, $alternate_contact_name, $alternate_contact_phone;
    public $height, $height_unit="centimeters", $weight, $weight_unit="kg", $bmi;
    public $consent_status, $consent_date, $consent_av, $consent_approval_date, $consent_approval_reference,$consent_approval_file;
    public $gen_surgical_info, $surgery_at_lumbar, $malignancies, $general_medical_history, $infections_suffered;
    public $general_inflammatory_diseases,$ankylosing_spondylosis,$rheumatoid_arthritis,$chronic_kidney_issues;
    public $chronic_liver_issues,$hiv,$aids,$hepatitis_b,$hepatitis_c,$diabetes_mellitus_self,$diabetes_mellitus_family;
    public $hypertension_self,$hypertension_family,$ihd_self,$ihd_family,$paralysis_self,$paralysis_family;
    public $consumption_non_tgp, $consumption_tobacco, $consumption_gutka, $consumption_pan,$anyother_habbits;
    public $past_complaints, $present_complaints, $past_medications, $present_medications, $addictive_substance_use;
    public $non_addictive_substance_use, $past_history, $notable_family_history, $before_problem_occupation;
    public $general_habits;
    /*
    protected $listeners = [
    'patientSelected' = 'setPatientUuid',
    ];
     #[On('patientSelected')] 
    public function setPatientUuid($uuid)
    {
        //dd("listening");
        $this->patientPrimaryInfo = Patient::where('status', $uuid)->get();
        //dd($uuid);
        $this->uuid = $uuid;
    }
    */
    public function mount($uuid)
    {
        $this->uuid = $uuid;
        //$this->patientPrimaryInfo = Patient::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        //$this->name = $this->patientPrimaryInfo->name;
        //dd($this->name);
    }
    
    public function render()
    {
        //dd($this->uuid);
        $this->patientPrimaryInfo = Patient::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        //dd($this->patientPrimaryInfo);
        $this->setFormValues($this->patientPrimaryInfo);
    
        return view('livewire.ctms.patients.edit.edit-primary-info');
    }

    public function fnSaveEditPrimaryInfo()
    {
        $this->input = $this->form->all();
        $edit = 'edit';
        $result = $this->saveEditedPrimaryPatientInfo($edit, $this->input, $this->uuid);
        //dd($this->input); // 
        //dd("reaching edit");
    }

    public function setFormValues($patientPrimaryInfo)
    {
        $this->form->center_id = $this->patientPrimaryInfo->center_id;
        $this->form->ctarm_id = $this->patientPrimaryInfo->ctarm_id;
        $this->form->opd_id = $this->patientPrimaryInfo->opd_id;
        $this->form->in_patient_id = $this->patientPrimaryInfo->in_patient_id;
        $this->form->admission_date = $this->patientPrimaryInfo->admission_date;
        $this->form->aadhar_id = $this->patientPrimaryInfo->aadhar_id;
        $this->form->pan_num = $this->patientPrimaryInfo->pan_num;
        $this->form->other_id = $this->patientPrimaryInfo->other_id;
        $this->form->name = $this->patientPrimaryInfo->name;
        $this->form->nick_name = $this->patientPrimaryInfo->nick_name;
        $this->form->alias_name = $this->patientPrimaryInfo->alias_name;
        $this->form->gender = $this->patientPrimaryInfo->gender;
        $this->form->date_of_birth = $this->patientPrimaryInfo->date_of_birth;
        $this->form->age = $this->patientPrimaryInfo->age;
        $this->form->present_occupation = $this->patientPrimaryInfo->present_occupation;
        $this->form->primary_phone_number = $this->patientPrimaryInfo->primary_phone_number;
        $this->form->alternate_phone_number = $this->patientPrimaryInfo->alternate_phone_number;
        $this->form->address = $this->patientPrimaryInfo->land_mark;
        $this->form->land_mark = $this->patientPrimaryInfo->land_mark;
        $this->form->taluka_haveli = $this->patientPrimaryInfo->taluka_haveli;
        $this->form->state = $this->patientPrimaryInfo->state;
        $this->form->emergency_contact_name = $this->patientPrimaryInfo->emergency_contact_name;
        $this->form->emergency_contact_phone = $this->patientPrimaryInfo->emergency_contact_phone;
        $this->form->alternate_contact_name = $this->patientPrimaryInfo->alternate_contact_name;
        $this->form->alternate_contact_phone = $this->patientPrimaryInfo->alternate_contact_phone;
        $this->form->height = $this->patientPrimaryInfo->height;
        $this->form->height_unit = $this->patientPrimaryInfo->height_unit; 
        $this->form->weight = $this->patientPrimaryInfo->weight;
        $this->form->weight_unit = $this->patientPrimaryInfo->weight_unit;
        $this->form->bmi = $this->patientPrimaryInfo->bmi;
        $this->form->consent_status = $this->patientPrimaryInfo->consent_status;
        $this->form->consent_date = $this->patientPrimaryInfo->consent_date;
        $this->form->consent_av = $this->patientPrimaryInfo->consent_av;
        $this->form->consent_approval_date = $this->patientPrimaryInfo->consent_approval_date;
        $this->form->consent_approval_reference = $this->patientPrimaryInfo->consent_approval_reference;
        $this->form->consent_approval_file = $this->patientPrimaryInfo->consent_approval_file;
        $this->form->gen_surgical_info = $this->patientPrimaryInfo->gen_surgical_info;
        $this->form->surgery_at_lumbar = $this->patientPrimaryInfo->surgery_at_lumbar;
        $this->form->malignancies = $this->patientPrimaryInfo->malignancies;
        $this->form->general_medical_history = $this->patientPrimaryInfo->general_medical_history;
        $this->form->infections_suffered = $this->patientPrimaryInfo->infections_suffered;
        $this->form->general_inflammatory_diseases = $this->patientPrimaryInfo->general_inflammatory_diseases;
        $this->form->ankylosing_spondylosis = $this->patientPrimaryInfo->ankylosing_spondylosis;
        $this->form->rheumatoid_arthritis = $this->patientPrimaryInfo->rheumatoid_arthritis;
        $this->form->chronic_kidney_issues = $this->patientPrimaryInfo->chronic_kidney_issues;
        $this->form->chronic_liver_issues = $this->patientPrimaryInfo->chronic_liver_issues;
        $this->form->hiv = $this->patientPrimaryInfo->hiv;
        $this->form->aids = $this->patientPrimaryInfo->aids;
        $this->form->hepatitis_b = $this->patientPrimaryInfo->hepatitis_b;
        $this->form->hepatitis_c = $this->patientPrimaryInfo->hepatitis_c;
        $this->form->diabetes_mellitus_self = $this->patientPrimaryInfo->diabetes_mellitus_self;
        $this->form->diabetes_mellitus_family = $this->patientPrimaryInfo->diabetes_mellitus_family;
        $this->form->hypertension_self = $this->patientPrimaryInfo->hypertension_self;
        $this->form->hypertension_family = $this->patientPrimaryInfo->hypertension_family;
        $this->form->ihd_self = $this->patientPrimaryInfo->ihd_self;
        $this->form->ihd_family = $this->patientPrimaryInfo->ihd_family;
        $this->form->paralysis_self = $this->patientPrimaryInfo->paralysis_self;
        $this->form->paralysis_family = $this->patientPrimaryInfo->paralysis_family;
        $this->form->consumption_non_tgp = $this->patientPrimaryInfo->consumption_non_tgp;
        $this->form->consumption_tobacco = $this->patientPrimaryInfo->consumption_tobacco;
        $this->form->consumption_gutka = $this->patientPrimaryInfo->consumption_gutka;
        $this->form->consumption_pan = $this->patientPrimaryInfo->consumption_pan;
        $this->form->anyother_habbits = $this->patientPrimaryInfo->anyother_habbits;
        $this->form->past_complaints = $this->patientPrimaryInfo->past_complaints;
        $this->form->present_complaints = $this->patientPrimaryInfo->present_complaints;
        $this->form->past_medications = $this->patientPrimaryInfo->past_medications;
        $this->form->present_medications = $this->patientPrimaryInfo->present_medications;
        $this->form->addictive_substance_use = $this->patientPrimaryInfo->addictive_substance_use;
        $this->form->non_addictive_substance_use = $this->patientPrimaryInfo->non_addictive_substance_use;
        $this->form->past_history = $this->patientPrimaryInfo->past_history;
        $this->form->notable_family_history = $this->patientPrimaryInfo->notable_family_history;
        $this->form->before_problem_occupation = $this->patientPrimaryInfo->before_problem_occupation;
        $this->form->general_habits = $this->patientPrimaryInfo->general_habits;
        $this->form->status = $this->patientPrimaryInfo->status;
        $this->form->status_date = $this->patientPrimaryInfo->status_date;
        $this->form->comment_entered_by = $this->patientPrimaryInfo->comment_entered_by;
        $this->form->entered_by = $this->patientPrimaryInfo->entered_by;
        $this->form->entry_date = $this->patientPrimaryInfo->entry_date;
    }

    public function saveEditedPrimaryPatientInfo($edit, $input, $uuid)
    {
        $updatedPrimaryInfo = Patient::where('patient_uuid', $uuid)->update($input);
        $this->message_panel = true;
        $msg = 'New Patient ['.$input['name'].'] update successfully!';
        $this->comSuccess = $msg;
        //dd($updatedPrimaryInfo);
    }
}

<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientForm extends Form
{
    #[Validate('required|numeric|max:3')]
    public $center_id = '1';

    #[Validate('required|numeric|max:3')]
    public $ctarm_id = '1';

    #[Validate('required|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|numeric')]
    public $aadhar_id = null;

    #[Validate('nullable|alpha_num')]
    public $pan_num = NULL;

    #[Validate('nullable|alpha_num')]
    public $other_id = NULL;

    #[Validate('nullable|alpha')]
    public $present_occupation = null;

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $nick_name = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $alias_name = null;

    #[Validate('required|alpha')]
    public $gender = null;

    #[Validate('required|date')]
    public $date_of_birth = null;

    #[Validate('nullable|numeric')]
    public $age = null;

    #[Validate('required|numeric')]
    public $primary_phone_number = null;

    #[Validate('nullable|numeric')]
    public $alternate_phone_number = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $address = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $land_mark = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $taluka_haveli = null;

    #[Validate('nullable|alpha')]
    public $state = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $emergency_contact_name = null;

    #[Validate('nullable|numeric')]
    public $emergency_contact_phone = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $alternate_contact_name = null;

    #[Validate('nullable|numeric')]
    public $alternate_contact_phone = null;

    #[Validate('nullable|numeric')]
    public $height = null;

    #[Validate('alpha')]
    public $height_unit = 'centimeters';

    #[Validate('nullable|numeric')]
    public $weight = null;

    #[Validate('alpha')]
    public $weight_unit = 'kg';

    #[Validate('nullable|numeric')]
    public $bmi = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $consent_status = null;

    #[Validate('nullable|date')]
    public $consent_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $consent_av = null;

    #[Validate('nullable|date')]
    public $consent_approval_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $consent_approval_reference = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $consent_approval_file = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $gen_surgical_info = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $surgery_at_lumbar = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $malignancies = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $general_medical_history = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $infections_suffered = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $general_inflammatory_diseases = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ankylosing_spondylosis = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $rheumatoid_arthritis = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $chronic_kidney_issues = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $chronic_liver_issues = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $hiv = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $aids = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $hepatitis_b = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,. ]+$/')]
    public $hepatitis_c = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $diabetes_mellitus_self = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $diabetes_mellitus_family = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $hypertension_self = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $hypertension_family = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ihd_self = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $ihd_family = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $paralysis_self = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $paralysis_family = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $past_complaints = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $present_complaints = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $past_medications = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $present_medications = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $addictive_substance_use = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $non_addictive_substance_use = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $past_history = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $notable_family_history = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $before_problem_occupation = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $general_habits = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $consumption_non_tgp = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $consumption_tobacco = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $consumption_gutka = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $consumption_pan = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $anyother_habbits = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9:.,\-_\/ ]+$/')]
    public $comment_entered_by = null;   

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;


}
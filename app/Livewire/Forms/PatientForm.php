<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientForm extends Form
{
    //#[Validate('required|max:5')]
    //public $pain_intensity = '';
 
    //#[Validate('required|max:5')]
    //public $personal_care = '';

    #[Validate('required|max:20')]
    public $center_id = '1';

    #[Validate('required|max:20')]
    public $ctarm_id = '1';

    #[Validate('max:3')]
    public $opd_id = '';

    #[Validate('max:3')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('numeric')]
    public $aadhar_id = '';

    #[Validate('alpha_num')]
    public $pan_num = '';

    #[Validate('alpha_num')]
    public $other_id = '';

    #[Validate('alpha')]
    public $present_occupation = '';

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = '';

    #[Validate('alpha')]
    public $nick_name = '';

    #[Validate('alpha')]
    public $alias_name = '';

    #[Validate('required|alpha')]
    public $gender = '';

    #[Validate('nullable|date')]
    public $date_of_birth = null;

    #[Validate('required|numeric')]
    public $age = '';

    #[Validate('required|numeric')]
    public $primary_phone_number = '';

    #[Validate('numeric')]
    public $alternate_phone_number = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $address = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $land_mark = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $taluka_haveli = '';

    #[Validate('alpha')]
    public $state = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $emergency_contact_name = '';

    #[Validate('numeric')]
    public $emergency_contact_phone = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $alternate_contact_name = '';

    #[Validate('numeric')]
    public $alternate_contact_phone = '';

    #[Validate('regex:/^[0-9]+$/')]
    public $height = 0;

    #[Validate('alpha')]
    public $height_unit = 'centimeters';

    #[Validate('regex:/^[0-9]+$/')]
    public $weight = 0;

    #[Validate('alpha')]
    public $weight_unit = 'kg';

    #[Validate('numeric')]
    public $bmi = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $consent_status = '';

    #[Validate('nullable|date')]
    public $consent_date = null;

    #[Validate('regex:/^[A-Za-z0-9 ]+$/')]
    public $consent_av = '';

    #[Validate('nullable|date')]
    public $consent_approval_date = null;

    #[Validate('regex:/^[A-Za-z0-9 ]+$/')]
    public $consent_approval_reference = '';

    #[Validate('regex:/^[A-Za-z0-9 ]+$/')]
    public $consent_approval_file = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $gen_surgical_info = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $surgery_at_lumbar = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $malignancies = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $general_medical_history = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $infections_suffered = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $general_inflammatory_diseases = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ankylosing_spondylosis = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $rheumatoid_arthritis = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $chronic_kidney_issues = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $chronic_liver_issues = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hiv = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $aids = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hepatitis_b = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hepatitis_c = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $diabetes_mellitus_self = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $diabetes_mellitus_family = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hypertension_self = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hypertension_family = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ihd_self = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ihd_family = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $paralysis_self = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $paralysis_family = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $past_complaints = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $present_complaints = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $past_medications = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $present_medications = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $addictive_substance_use = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $non_addictive_substance_use = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $past_history = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $notable_family_history = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $before_problem_occupation = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $general_habits = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $consumption_non_tgp = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $consumption_tobacco = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $consumption_gutka = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $consumption_pan = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $anyother_habbits = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';   

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}
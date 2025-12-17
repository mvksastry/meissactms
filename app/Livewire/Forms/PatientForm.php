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

    #[Validate('required|numeric|max:3')]
    public $center_id = '1';

    #[Validate('required|numeric|max:3')]
    public $ctarm_id = '1';

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9-_ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|numeric')]
    public $aadhar_id = null;

    #[Validate('nullable|alpha_num')]
    public $pan_num = '';

    #[Validate('nullable|alpha_num')]
    public $other_id = '';

    #[Validate('nullable|alpha')]
    public $present_occupation = '';

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $nick_name = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $alias_name = '';

    #[Validate('required|alpha')]
    public $gender = '';

    #[Validate('nullable|date')]
    public $date_of_birth = null;

    #[Validate('required|numeric')]
    public $age = '';

    #[Validate('required|numeric')]
    public $primary_phone_number = '';

    #[Validate('nullable|numeric')]
    public $alternate_phone_number = '';

    #[Validate('regex:/^[A-Za-z0-9,.- ]+$/')]
    public $address = '';

    #[Validate('regex:/^[A-Za-z0-9,.- ]+$/')]
    public $land_mark = '';

    #[Validate('regex:/^[A-Za-z0-9,.- ]+$/')]
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

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $height = 0;

    #[Validate('alpha')]
    public $height_unit = 'centimeters';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $weight = 0;

    #[Validate('alpha')]
    public $weight_unit = 'kg';

    #[Validate('numeric')]
    public $bmi = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $consent_status = '';

    #[Validate('nullable|date')]
    public $consent_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,-_ ]+$/')]
    public $consent_av = '';

    #[Validate('nullable|date')]
    public $consent_approval_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,-_ ]+$/')]
    public $consent_approval_reference = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/')]
    public $consent_approval_file = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $gen_surgical_info = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $surgery_at_lumbar = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $malignancies = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $general_medical_history = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $infections_suffered = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $general_inflammatory_diseases = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $ankylosing_spondylosis = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $rheumatoid_arthritis = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $chronic_kidney_issues = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $chronic_liver_issues = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $hiv = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $aids = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $hepatitis_b = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,. ]+$/')]
    public $hepatitis_c = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $diabetes_mellitus_self = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $diabetes_mellitus_family = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $hypertension_self = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $hypertension_family = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $ihd_self = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $ihd_family = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $paralysis_self = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $paralysis_family = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $past_complaints = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $present_complaints = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $past_medications = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $present_medications = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $addictive_substance_use = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $non_addictive_substance_use = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $past_history = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $notable_family_history = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $before_problem_occupation = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $general_habits = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $consumption_non_tgp = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $consumption_tobacco = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $consumption_gutka = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $consumption_pan = '';

    #[Validate('nullable|regex:/^[A-Za-z0-9,.-_ ]+$/')]
    public $anyother_habbits = '';

    #[Validate('nullable|regex:/^[A-Za-z.,-_ ]+$/')]
    public $comment_entered_by = '';   

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}
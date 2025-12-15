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

    #[Validate('required|max:3')]
    public $center_id = '1';

    #[Validate('required|max:3')]
    public $ctarm_id = '1';

    #[Validate('max:3')]
    public $opd_id = '';

    #[Validate('max:3')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('numeric')]
    public $aadhar_id = '';

    #[Validate('alpha_num')]
    public $pan_num = '';

    #[Validate('alpha_num')]
    public $other_id = '';

    #[Validate('alpha')]
    public $present_occupation = '';

    #[Validate('alpha')]
    public $name = '';

    #[Validate('alpha')]
    public $nick_name = '';

    #[Validate('alpha')]
    public $alias_name = '';

    #[Validate('alpha')]
    public $gender = '';

    #[Validate('date')]
    public $date_of_birth = '';

    #[Validate('numeric')]
    public $age = '';

    #[Validate('numeric')]
    public $primary_phone_number = '';

    #[Validate('numeric')]
    public $alternate_phone_number = '';

    #[Validate('alpha_num')]
    public $address = '';

    #[Validate('alpha_num')]
    public $land_mark = '';

    #[Validate('alpha_num')]
    public $taluka_haveli = '';

    #[Validate('alpha')]
    public $state = '';

    #[Validate('alpha')]
    public $emergency_contact_name = '';

    #[Validate('numeric')]
    public $emergency_contact_phone = '';

    #[Validate('alpha')]
    public $alternate_contact_name = '';

    #[Validate('numeric')]
    public $alternate_contact_phone = '';

    #[Validate('numeric')]
    public $height = '';

    #[Validate('alpha')]
    public $height_unit = 'centimeters';

    #[Validate('numeric')]
    public $weight = '';

    #[Validate('alpha')]
    public $weight_unit = 'kg';

    #[Validate('numeric')]
    public $bmi = '';

    #[Validate('alpha')]
    public $consent_status = '';

    #[Validate('date')]
    public $consent_date = '';

    #[Validate('alpha')]
    public $consent_av = '';

    #[Validate('date')]
    public $consent_approval_date = '';

    #[Validate('alpha_num')]
    public $consent_approval_reference = '';

    #[Validate('alpha_num')]
    public $consent_approval_file = '';

    #[Validate('max:3')]
    public $gen_surgical_info = '';

    #[Validate('alpha_num')]
    public $surgery_at_lumbar = '';

    #[Validate('alpha_num')]
    public $malignancies = '';

    #[Validate('alpha_num')]
    public $general_medical_history = '';

    #[Validate('alpha_num')]
    public $infections_suffered = '';

    #[Validate('alpha_num')]
    public $general_inflammatory_diseases = '';

    #[Validate('alpha_num')]
    public $ankylosing_spondylosis = '';

    #[Validate('alpha_num')]
    public $rheumatoid_arthritis = '';

    #[Validate('alpha_num')]
    public $chronic_kidney_issues = '';

    #[Validate('alpha_num')]
    public $chronic_liver_issues = '';

    #[Validate('alpha_num')]
    public $hiv = '';

    #[Validate('alpha_num')]
    public $aids = '';

    #[Validate('alpha_num')]
    public $hepatitis_b = '';

    #[Validate('alpha_num')]
    public $hepatitis_c = '';

    #[Validate('alpha_num')]
    public $diabetes_mellitus_self = '';

    #[Validate('alpha_num')]
    public $diabetes_mellitus_family = '';

    #[Validate('alpha_num')]
    public $hypertension_self = '';

    #[Validate('alpha_num')]
    public $hypertension_family = '';

    #[Validate('alpha_num')]
    public $ihd_self = '';

    #[Validate('alpha_num')]
    public $ihd_family = '';

    #[Validate('alpha_num')]
    public $paralysis_self = '';

    #[Validate('alpha_num')]
    public $paralysis_family = '';

    #[Validate('alpha_num')]
    public $past_complaints = '';

    #[Validate('alpha_num')]
    public $present_complaints = '';

    #[Validate('alpha_num')]
    public $past_medications = '';

    #[Validate('alpha_num')]
    public $present_medications = '';

    #[Validate('alpha_num')]
    public $addictive_substance_use = '';

    #[Validate('alpha_num')]
    public $non_addictive_substance_use = '';

    #[Validate('alpha_num')]
    public $past_history = '';

    #[Validate('alpha_num')]
    public $notable_family_history = '';

    #[Validate('alpha_num')]
    public $before_problem_occupation = '';

    #[Validate('alpha_num')]
    public $general_habits = '';

    #[Validate('alpha_num')]
    public $consumption_non_tgp = '';

    #[Validate('alpha_num')]
    public $consumption_tobacco = '';

    #[Validate('alpha_num')]
    public $consumption_gutka = '';

    #[Validate('alpha_num')]
    public $consumption_pan = '';

    #[Validate('alpha_num')]
    public $anyother_habbits = '';

    #[Validate('alpha_num')]
    public $comment_entered_by = '';   

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('alpha_num')]
    public $entry_date = '';
}
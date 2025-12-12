<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class MdtreForm extends Form
{
    #[Validate('required|max:5')]
    public $patient_uuid = '';
    
    #[Validate('required|max:5')]
    public $center_id = 1;

    #[Validate('required|max:5')]
    public $ctarm_id = 1;

    #[Validate('required|max:5')]
    public $opd_id = '';

    #[Validate('required|max:5')]
    public $in_patient_id = '';

    #[Validate('required|max:5')]
    public $admission_date = '';

    #[Validate('required|max:5')]
    public $aadhar_id = '';

    #[Validate('required|max:5')]
    public $pan_num = '';

    #[Validate('required|max:5')]
    public $other_id = '';

    #[Validate('required|max:5')]
    public $hip_flex_adduction = '';

    #[Validate('required|max:5')]
    public $knee_extension = '';

    #[Validate('required|max:5')]
    public $ankle_dorsiflexion = '';

    #[Validate('required|max:5')]
    public $decreased_patellar_reflex = '';

    #[Validate('required|max:5')]
    public $extensor_hallucis_longus = '';

    #[Validate('required|max:5')]
    public $hip_abduction = '';

    #[Validate('required|max:5')]
    public $ankle_plantar_flexion = '';

    #[Validate('required|max:5')]
    public $dec_achilles_tendon_reflex = '';

    #[Validate('required|max:5')]
    public $straight_leg_raise = '';

    #[Validate('required|max:5')]
    public $contralateral_slr = '';

    #[Validate('required|max:5')]
    public $femoral_nerve_stretch_test = '';

    #[Validate('required|max:5')]
    public $trendelenburg_gait = '';

    #[Validate('required|max:5')]
    public $antalgic_gait = '';

    #[Validate('required|max:5')]
    public $list = '';

    #[Validate('required|max:5')]
    public $entered_by = '';

    #[Validate('required|max:5')]
    public $entry_date = '';

    #[Validate('required|max:5')]
    public $verified_by = '';

    #[Validate('required|max:5')]
    public $verified_date = '';

    #[Validate('required|max:5')]
    public $entry_sealed_by = '';

    #[Validate('required|max:5')]
    public $entry_sealed_date = '';
}
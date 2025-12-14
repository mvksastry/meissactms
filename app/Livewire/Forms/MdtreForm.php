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

    #[Validate('alpha')]
    public $hip_flex_adduction = '';

    #[Validate('alpha')]
    public $knee_extension = '';

    #[Validate('alpha')]
    public $ankle_dorsiflexion = '';

    #[Validate('alpha')]
    public $decreased_patellar_reflex = '';

    #[Validate('alpha')]
    public $extensor_hallucis_longus = '';

    #[Validate('alpha')]
    public $hip_abduction = '';

    #[Validate('alpha')]
    public $ankle_plantar_flexion = '';

    #[Validate('alpha')]
    public $dec_achilles_tendon_reflex = '';

    #[Validate('alpha')]
    public $straight_leg_raise = '';

    #[Validate('alpha')]
    public $contralateral_slr = '';

    #[Validate('alpha')]
    public $femoral_nerve_stretch_test = '';

    #[Validate('alpha')]
    public $trendelenburg_gait = '';

    #[Validate('alpha')]
    public $antalgic_gait = '';

    #[Validate('alpha')]
    public $list = '';

    #[Validate('alpha')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = '';

    #[Validate('alpha')]
    public $verified_by = '';

    #[Validate('date')]
    public $verified_date = '';

    #[Validate('alpha')]
    public $entry_sealed_by = '';

    #[Validate('date')]
    public $entry_sealed_date = '';
}
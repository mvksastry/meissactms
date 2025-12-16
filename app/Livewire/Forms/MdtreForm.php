<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class MdtreForm extends Form
{
    #[Validate('alpha_num')]
    public $opd_id = '';

    #[Validate('alpha_num')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;


    #[Validate('alpha_num')]
    public $hip_flex_adduction = '';

    #[Validate('alpha_num')]
    public $knee_extension = '';

    #[Validate('alpha_num')]
    public $ankle_dorsiflexion = '';

    #[Validate('alpha_num')]
    public $decreased_patellar_reflex = '';

    #[Validate('alpha_num')]
    public $extensor_hallucis_longus = '';

    #[Validate('alpha_num')]
    public $hip_abduction = '';

    #[Validate('alpha_num')]
    public $ankle_plantar_flexion = '';

    #[Validate('alpha_num')]
    public $dec_achilles_tendon_reflex = '';

    #[Validate('alpha_num')]
    public $straight_leg_raise = '';

    #[Validate('alpha_num')]
    public $contralateral_slr = '';

    #[Validate('alpha_num')]
    public $femoral_nerve_stretch_test = '';

    #[Validate('alpha_num')]
    public $trendelenburg_gait = '';

    #[Validate('alpha_num')]
    public $antalgic_gait = '';

    #[Validate('alpha_num')]
    public $list = '';

    
    #[Validate('alpha_num')]
    public $comment_entered_by = '';

    #[Validate('alpha_num')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = null;
}
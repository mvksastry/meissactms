<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class MdtreForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;


    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hip_flex_adduction = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $knee_extension = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ankle_dorsiflexion = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $decreased_patellar_reflex = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $extensor_hallucis_longus = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hip_abduction = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ankle_plantar_flexion = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $dec_achilles_tendon_reflex = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $straight_leg_raise = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $contralateral_slr = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $femoral_nerve_stretch_test = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $trendelenburg_gait = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $antalgic_gait = '';

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $list = '';

    
    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}
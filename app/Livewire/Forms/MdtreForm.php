<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class MdtreForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $opd_id = null;

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = null;
    
   // #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/|max:20')]
   // public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;


    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hip_flex_adduction = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $knee_extension = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ankle_dorsiflexion = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $decreased_patellar_reflex = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $extensor_hallucis_longus = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $hip_abduction = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $ankle_plantar_flexion = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $dec_achilles_tendon_reflex = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $straight_leg_raise = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $contralateral_slr = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $femoral_nerve_stretch_test = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $trendelenburg_gait = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $antalgic_gait = null;

    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $list = null;

    
    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}
<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientVAScoreForm extends Form
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
    public $intensity = '';

    #[Validate('required|max:5')]
    public $location = '';

    #[Validate('required|max:5')]
    public $onset = '';

    #[Validate('required|max:5')]
    public $duration = '';

    #[Validate('required|max:5')]
    public $variation = '';

    #[Validate('required|max:5')]
    public $quality = '';




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
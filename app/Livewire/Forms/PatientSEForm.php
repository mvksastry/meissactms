<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientSEForm extends Form
{

    #[Validate('regex:/^[A-Za-z0-9_\- ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9_\- ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('regex:/^[A-Za-z0-9,.\- ]+$/')]
    public $S1 = '';
    #[Validate('regex:/^[A-Za-z0-9,.\- ]+$/')]
    public $L1 = '';
    #[Validate('regex:/^[A-Za-z0-9,.\- ]+$/')]
    public $L2 = '';
    #[Validate('regex:/^[A-Za-z0-9,.\- ]+$/')]
    public $L3 = '';
    #[Validate('regex:/^[A-Za-z0-9,.\- ]+$/')]
    public $L4 = '';
    #[Validate('regex:/^[A-Za-z0-9,.\- ]+$/')]
    public $L5 = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z0 ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
    
}
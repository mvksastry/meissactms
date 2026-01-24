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

    #[Validate('regex:/^[0-2]+$/')]
    public $lL1 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $lL2 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $lL3 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $lL4 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $lL5 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $lS1 = '';

    #[Validate('regex:/^[0-2]+$/')]
    public $rL1 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $rL2 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $rL3 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $rL4 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $rL5 = '';
    #[Validate('regex:/^[0-2]+$/')]
    public $rS1 = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z0 ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
    
}
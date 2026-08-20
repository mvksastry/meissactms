<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientSEForm extends Form
{

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;
    
   // #[Validate('regex:/^[A-Za-z0-9,.\-\/ ]+$/|max:20')]
    //public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;
                
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lL1 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lL2 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lL3 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lL4 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lL5 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lS1 = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rL1 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rL2 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rL3 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rL4 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rL5 = null;
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rS1 = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z0 ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
    
}
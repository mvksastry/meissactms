<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientRMQForm extends Form
{   
    #[Validate('alpha_num')]
    public $opd_id = null;

    #[Validate('alpha_num')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;


    
    #[Validate('numeric')]
    public $rmq_replies = null;


    #[Validate('regex:/^[A-Za-z0-9,. ]+$/')]
    public $comment_entered_by = '';

    #[Validate('alpha')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;  

}
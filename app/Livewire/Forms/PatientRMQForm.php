<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PatientRMQForm extends Form
{   
    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('nullable|date')]
    public $admission_date = null;


    
    #[Validate('nullable|regex:/^[0-25 ]+$/')]
    public $rmq_replies = null;


    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $comment_entered_by = '';

    #[Validate('regex:/^[A-Za-z0-9,.\-_\/ ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;  

}
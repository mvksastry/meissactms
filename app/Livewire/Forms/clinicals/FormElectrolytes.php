<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormElectrolytes extends Form
{
    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    


    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $sodium = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $potassium = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $chloride = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $electrolyte_report_file = '';

    #[Validate('nullable|regex:/^[0-9]+$/')]
    public $electrolyte_report_file_path = '';



    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = '';

    #[Validate('nullable|date')]
    public $entry_date = null;
}
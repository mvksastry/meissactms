<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PfirmannForm extends Form
{
    #[Validate('max:45')]
    public $opd_id = '';

    #[Validate('max:5')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    #[Validate('max:5')]
    public $modified_pfirman_grade = '';

    #[Validate('alpha_num')]
    public $comment_entered_by = '';

    #[Validate('alpha')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = null;
}
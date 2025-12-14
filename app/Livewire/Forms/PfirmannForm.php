<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class PfirmannForm extends Form
{
    #[Validate('alpha_num|max:55')]
    public $patient_uuid = '';
    
    #[Validate('max:5')]
    public $center_id = 1;

    #[Validate('max:5')]
    public $ctarm_id = 1;

    #[Validate('max:45')]
    public $opd_id = '';

    #[Validate('max:5')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = '';

    #[Validate('max:15')]
    public $aadhar_id = '';

    #[Validate('max:15')]
    public $pan_num = '';

    #[Validate('max:25')]
    public $other_id = '';


    #[Validate('max:5')]
    public $modified_pfirmans_grade = '';

    #[Validate('alpha|max:55')]
    public $entered_by = '';

    #[Validate('date')]
    public $entry_date = '';

    #[Validate('alpha|max:55')]
    public $verified_by = '';

    #[Validate('date')]
    public $verified_date = '';

    #[Validate('alpha|max:55')]
    public $entry_sealed_by = '';

    #[Validate('date')]
    public $entry_sealed_date = '';

}
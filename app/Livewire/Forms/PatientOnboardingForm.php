<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientOnboardingForm extends Form
{
    #[Validate('required|numeric|max:3')]
    public $center_id = '1';

    #[Validate('required|numeric|max:3')]
    public $ctarm_id = '1';

    #[Validate('required|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $subject_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|numeric')]
    public $aadhar_id = null;

    #[Validate('nullable|alpha_num')]
    public $pan_num = NULL;

    #[Validate('nullable|alpha_num')]
    public $other_id = NULL;

    #[Validate('nullable|alpha')]
    public $present_occupation = null;

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $nick_name = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $alias_name = null;

    #[Validate('required|alpha')]
    public $gender = null;

    #[Validate('required|date')]
    public $date_of_birth = null;

    #[Validate('nullable|numeric')]
    public $age = null;

    #[Validate('required|numeric')]
    public $primary_phone_number = null;

    #[Validate('nullable|numeric')]
    public $alternate_phone_number = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $address = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $land_mark = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9,.\-\/ ]+$/')]
    public $taluka_haveli = null;

    #[Validate('nullable|alpha')]
    public $state = null;


    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;   

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}

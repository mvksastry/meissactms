<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientOnboardingForm extends Form
{

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $subject_id = null;

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = null;

    #[Validate('required|alpha')]
    public $gender = null;

    #[Validate('required|date')]
    public $date_of_birth = null;

    #[Validate('nullable|numeric')]
    public $age = null;

    #[Validate('required|numeric')]
    public $primary_phone_number = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_\/ ]+$/')]
    public $comment_entered_by = null;   
}

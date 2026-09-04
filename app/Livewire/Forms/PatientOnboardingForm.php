<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;

class PatientOnboardingForm extends Form
{

    #[Validate('required|alpha_num|max:20', message: 'Only Alpha NUmbers no space')]
    public $opd_id = null;

    #[Validate('required|alpha_num|max:20', message: 'Only Alpha NUmbers no space')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('nullable|alpha_num|max:20')]
    public $subject_id = null;

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = null;

    #[Validate('required|in:male,female')]
    public $gender = null;

    #[Validate('required|date')]
    public $date_of_birth = null;

    #[Validate('nullable|numeric|min_digits:2|max:110')]
    public $age = null;

    #[Validate('required|numeric|min_digits:10|max_digits:10')]
    public $primary_phone_number = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;   


    public function updatedGender($value)
    {
        // Normalize to lowercase and trim spaces
        if (is_string($value)) {
            $this->gender = strtolower(trim($value));
        }
    }
}

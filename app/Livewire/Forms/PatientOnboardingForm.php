<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;

class PatientOnboardingForm extends Form
{

    #[Validate('required|alpha_num|max:20', message: 'Only Alpha NUmbers no space')]
    public $opd_id = null;

    #[Validate('required|regex:/^[A-Za-z ]+$/')]
    public $name = null;

    #[Validate('required|numeric|min_digits:12|max_digits:12')]
    public $aadhar_id = null;

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

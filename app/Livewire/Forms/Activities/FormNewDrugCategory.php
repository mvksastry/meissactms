<?php

namespace App\Livewire\Forms\Activities;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FormNewDrugCategory extends Form
{
    //
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    #[Validate('required|date')]
    public $category_name;

    #[Validate('required|regex:/^[A-Za-z0-9 ]+$/|max:200')]
    public $description;    

    #[Validate('required|regex:/^[A-Za-z ]+$/|max:20')]
    public $posted_by;

}

<?php

namespace App\Livewire\Forms\clinicals;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FormNewDrugDetail extends Form
{
    //
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;


    #[Validate('required|numeric')]
    public $category_id;

    #[Validate('required|regex:/^[A-Za-z0-9 ]+$/|max:200')]
    public $drug_name;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $brand;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $drug_class;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $generic_name;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $single_dose;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $frequency;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $total_daily_dose;

    #[Validate('nullable|regex:/^[A-Za-z0-9 ]+$/|max:20')]
    public $last_week_adherance;
    

    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;








}

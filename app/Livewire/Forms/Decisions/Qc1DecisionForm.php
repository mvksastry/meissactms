<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Qc1DecisionForm extends Form
{
    #[Validate('required|numeric')]
    public $code230240;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qc_report1_description = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qc_report2_description = null;
}

<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FinalDecisionForm extends Form
{
    #[Validate('required|regex:/^[A-Za-z]+$/')]
    public $enrollment_decision = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $decision_comment = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $decision_entered_by = null;
    #[Validate('date')]
    public $decision_date_entered = null;
}

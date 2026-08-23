<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FinalDecisionForm extends Form
{
    #[Validate('required|regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $comment_decision = null;
    #[Validate('required|numeric')]
    public $enrollment_decision;

}

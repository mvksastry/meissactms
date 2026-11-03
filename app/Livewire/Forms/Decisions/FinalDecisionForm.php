<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class FinalDecisionForm extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $comment_decision1 = null;
    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $comment_decision2 = null;
    #[Validate('required|numeric')]
    public $enrollment_decision;

}

<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TransplantDecisionForm extends Form
{
    #[Validate('date')]
    public $transplantation_date = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $transplantation_info = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $transplantation_comments = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $transplant_info_entered_by = null;
    #[Validate('date')]
    public $transplant_info_date_entered = null;
}

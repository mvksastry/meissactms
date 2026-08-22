<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class QaDecisionForm extends Form
{
    #[Validate('required|numeric')]
    public $code310320 = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qa_other_infos = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qa_enrollment_comment = null;
    //#[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    //public $qa_infos_entered_by = null;
    //#[Validate('date')]
    //public $qa_infos_date_entered = null;
}

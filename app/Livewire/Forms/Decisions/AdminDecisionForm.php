<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminDecisionForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $patient_unique_id = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $mbr_id = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $linked_sample_id = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $other_infos = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $administrative_comment = null;
}

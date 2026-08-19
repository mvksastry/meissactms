<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SampleEntryForm extends Form
{

    #[Validate('required|regex:/^[0-9]+$/')]
    public $code1112;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $discectomy_sample_desc = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $discectomy_sample_number = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $discectomy_sample_comments = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $discectomy_sample_info_entered_by = null;
    #[Validate('date')]
    public $discectomy_sample_info_date_entered = null;
}

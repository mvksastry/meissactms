<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DiscectomyForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9]+$/')]
    public $opd_id;
    #[Validate('regex:/^[A-Za-z0-9]+$/')]
    public $discectomy_ipd_id = null;
    #[Validate('date')]
    public $discectomy_admission_date = null;

    #[Validate('required|regex:/^[0-9]+$/')]
    public $code170200;
    #[Validate('date')]
    public $discectomy_date = null;
    #[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $surgeons_names = null;
    #[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $discectomy_other_info = null;
    #[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $discectomy_comments = null;
    //#[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    //public $disc_info_entered_by = null;
    //#[Validate('date')]
    //public $disc_info_date_entered = null;
}

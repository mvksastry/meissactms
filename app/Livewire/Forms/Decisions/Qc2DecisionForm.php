<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Qc2DecisionForm extends Form
{


    #[Validate('required|numeric')]
    public $code280300;
    #[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $qc_coa_description = null;
    #[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $qc_report3_description = null;
    #[Validate('regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $qc_other_infos = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qc_enrollment_comment = null;

    //#[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    //public $qc_infos_entered_by = null;
    //#[Validate('date')]
    //public $qc_infos_date_entered = null;

}

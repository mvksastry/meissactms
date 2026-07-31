<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DecisionReportFiles extends Form
{
    //
    #[Validate('required|file|mimes:pdf|max:2048')]
    public $qc_report_1 = null;

    #[Validate('required|file|mimes:pdf|max:2048')]
    public $qc_report_2 = null;

    #[Validate('required|file|mimes:pdf|max:2048')]
    public $qc_report_3 = null;

    #[Validate('required|file|mimes:pdf|max:2048')]
    public $qc_coa = null;
}

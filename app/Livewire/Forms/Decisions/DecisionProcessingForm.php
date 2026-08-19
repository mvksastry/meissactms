<?php

namespace App\Livewire\Forms\Decisions;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DecisionProcessingForm extends Form
{
    #[Validate('regex:/^[A-Za-z0-9]+$/')]
    public $opd_id = null;
    #[Validate('regex:/^[A-Za-z0-9]+$/')]
    public $discectomy_ipd_id = null;
    #[Validate('date')]
    public $discectomy_admission_date = null;


    #[Validate('required|regex:/^[0-9]+$/')]
    public $code8910 = null;
    #[Validate('date')]
    public $discectomy_date = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $surgeons_names = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $discectomy_other_info = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $discectomy_comments = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $disc_info_entered_by = null;
    #[Validate('date')]
    public $disc_info_date_entered = null;



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



    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qc_other_infos = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qc_enrollment_comment = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qc_infos_entered_by = null;
    #[Validate('date')]
    public $qc_infos_date_entered = null;



    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qa_other_infos = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qa_enrollment_comment = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $qa_infos_entered_by = null;
    #[Validate('date')]
    public $qa_infos_date_entered = null;

    
    #[Validate('required|regex:/^[A-Za-z]+$/')]
    public $enrollment_decision = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $decision_comment = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $decision_entered_by = null;
    #[Validate('date')]
    public $decision_date_entered = null;


    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $patient_unique_id = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $mbr_id = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $linked_sample_id = null;
    #[Validate('regex:/^[A-Za-z0-9., \-_]+$/')]
    public $other_infos = null;

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

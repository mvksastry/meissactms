<?php
 
namespace App\Livewire\Forms\Clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormBloodRoutine extends Form
{
    #[Validate('regex:/^[A-Za-z0-9\-]+$/|max:20')]
    public $opd_id = '';

    #[Validate('regex:/^[A-Za-z0-9\-_\/ ]+$/|max:20')]
    public $in_patient_id = '';

    #[Validate('date')]
    public $admission_date = null;

    
    #[Validate('date')]
    public $rbc = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $hgb = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $hct = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $mcv = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $mch = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $mchc = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $rdw_sd = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $rdw_cv = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $plt = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $pdw = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $mpv = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $plcr = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $pct = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $wbc = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $neutrophils_abs = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $neutrophils_percent = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $lymph_abs = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $lymph_percent = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $mono_abs = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $mono_percent = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $eo_abs = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $eo_percent = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $baso_abs = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $baso_percent = null;

    #[Validate('regex:/^[0-9]+$/|max:20')]
    public $ig_abs = null;

    #[Validate('regex:/^[0-9.]+$/|max:20')]
    public $ig_percent = null;

    #[Validate('regex:/^[A-Za-z0-9_]+$/|max:20')]
    public $observations = null;

    #[Validate('regex:/^[A-Za-z0-9_]+$/|max:20')]
    public $br_report_file = null;

    #[Validate('regex:/^[A-Za-z0-9_]+$/|max:20')]
    public $br_report_file_path = null;


    
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}
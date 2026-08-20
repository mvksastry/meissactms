<?php
 
namespace App\Livewire\Forms\clinicals;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormBloodRoutine extends Form
{
    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $opd_id = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9]+$/|max:20')]
    public $in_patient_id = null;

    #[Validate('nullable|date')]
    public $admission_date = null;

    
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rbc = null;
                      
    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $hgb = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $hct = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $mcv = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $mch = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $mchc = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rdw_sd = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $rdw_cv = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $plt = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $pdw = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $mpv = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $plcr = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $pct = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $wbc = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $neutrophils_abs = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $neutrophils_percent = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lymph_abs = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $lymph_percent = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $mono_abs = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $mono_percent = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $eo_abs = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $eo_percent = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $baso_abs = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $baso_percent = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $ig_abs = null;

    #[Validate('nullable|regex:/^\d+(\.\d+)?$/')]
    public $ig_percent = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,\-_ ]+$/')]
    public $observations = null;

//    #[Validate('regex:/^[A-Za-z0-9_]+$/')]
//    public $br_report_file = null;

//    #[Validate('regex:/^[A-Za-z0-9_]+$/')]
//    public $br_report_file_path = null;

    #[Validate('nullable|regex:/^[A-Za-z0-9.,:\-_\/ ]+$/')]
    public $comment_entered_by = null;

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}
<?php

namespace App\Models\Ctms\Clinicals;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class BloodRoutine extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'blood_routines';

    protected $primaryKey = 'blood_routine_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'patient_uuid',                          

        'opd_id', 
        'in_patient_id',
        'admission_date', 

        'rbc',
        'hgb',
        'hct',
        'mcv',
        'mch',

        'mchc',
        'rdw_sd',
        'rdw_cv',
        'plt',
        'pdw',

        'mpv',
        'plcr',
        'pct',
        'wbc',

        'neutrophils_abs',
        'neutrophils_percent',
        'lymph_abs',
        'lymph_percent',

        'mono_abcs',
        'mono_percent',
        'eo_abs',
        'eo_percent',

        'baso_abs',
        'baso_percent',
        'ig_abs',
        'ig_percent',

        'observations',
        'br_report_file',
        'br_report_file_path',


        'status',
        'status_date',

        'comment_entered_by',
        'entered_by',
        'entry_date',

        'comment_verified_by',
        'verified_by',
        'verified_date',

        'comment_cro',
        'cro_approval',
        'cro_approval_date',

        'comment_sealed_by',
        'sealed_by',
        'sealed_date',
        
        'created_at',
        'updated_at',
    ];
}

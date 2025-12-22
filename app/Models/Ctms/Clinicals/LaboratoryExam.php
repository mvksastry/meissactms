<?php

namespace App\Models\Ctms\Clinicals;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class LaboratoryExam extends Model
{
    //
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'laboratory_exams';

    protected $primaryKey = 'laboratory_exam_id';

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

        'esr',
        'pt_patient',
        'pt_control',
        'inr',
        'isi',

        'esr_report_file',
        'esr_report_file_path',
        'pt_report_file',
        'pt_report_file_path',


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

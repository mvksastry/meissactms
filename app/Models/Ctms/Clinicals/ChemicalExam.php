<?php

namespace App\Models\Ctms\Clinicals;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class ChemicalExam extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'chemical_examinations';

    protected $primaryKey = 'chemical_exam_id';

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

        'proteins',
        'sugar',
        'ketones',
        'procalcitonin',
        'bile_salts',
        'bile_pigments',

        'ce_report_file',
        'ce_report_file_path',


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

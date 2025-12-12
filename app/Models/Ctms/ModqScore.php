<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class ModqScore extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'modq_scores';

    protected $primaryKey = 'modqscore_id';

    protected $fillable = [
        'mdtre_exam_id', 
        'patient_uuid',
        'center_id',  
        'ctarm_id',  
        'opd_id',  
        'in_patient_id',  
        'admission_date',  
        'aadhar_id',  
        'pan_num',  
        'other_id', 
        
        'pain_intensity',
        'personal_care',
        'lifting',
        'walking',
        'sitting',
        'standing',
        'sleeping',
        'social Life',
        'travelling',
        'employment_home_making',
        'total',
        'modq_score',

        'entered_by',
        'entry_date',
        'verified_by',
        'verified_date',
        'sealed_by',
        'sealed_date',
        'created_at',
        'updated_at',
    ];
}

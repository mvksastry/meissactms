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


        'patient_uuid',
  
        'opd_id',  
        'in_patient_id',  
        'admission_date',  
        
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

<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class Mdtre extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'mdtre_exams';

    protected $primaryKey = 'mdtre_exam_id';

    protected $fillable = [
        'patient_uuid',
 
        'opd_id',  
        'in_patient_id',  
        'admission_date',   

        'hip_flex_adduction',  
        'knee_extension',
        'ankle_dorsiflexion',
        'decreased_patellar_reflex',
        'extensor_hallucis_longus',
        'hip_abduction',
        'ankle_plantar_flexion',
        'dec_achilles_tendon_reflex',

        'straight_leg_raise',
        'contralateral_slr',
        'femoral_nerve_stretch_test',

        'trendelenburg_gait',
        'antalgic_gait',
        'list',
        
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

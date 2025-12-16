<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class PfirmannGrade extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'pfirmann_grades';

    protected $primaryKey = 'pfirmann_grade_id';

    protected $fillable = [
        'patient_uuid',
        
        'opd_id', 
        'in_patient_id',
        'admission_date', 

        'modified_pfirman_grade',
        
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

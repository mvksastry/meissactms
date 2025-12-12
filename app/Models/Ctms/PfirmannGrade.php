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
        'center_id',
        'ctarm_id',
        'opd_id', 
        'in_patient_id',
        'admission_date', 
        'aadhar_id',
        'pan_num',
        'other_id',

        'modified_pfirman_grade',

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

<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;

class ClinicalReports extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'clinical_reports';

    protected $primaryKey = 'clinicalreport_id';

    protected $fillable = [
        
        'patient_uuid',      
        'report_category',
        'report_description',
        'tags',
        'file_name',
        'file_path',
        'report_status',
        'uploaded_by',
        'created_uuid',
        'date_created',
        'approved_name',
        'approved_uuid',
        'approved_date',

        'created_at',
        'updated_at',
    ];

    public function user()
    {
    return $this->hasOne(User::class, 'id', 'uploaded_by');
    }

}

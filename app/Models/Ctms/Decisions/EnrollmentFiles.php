<?php

namespace App\Models\Ctms\Decisions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;

class EnrollmentFiles extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'enrollment_files';

    protected $primaryKey = 'enrollment_file_id';

    protected $fillable = [
        'patient_uuid',
        'file_code',
        'file_uuid',
        'report_category',
        'report_description',
        'tags',
        'file_name',
        'file_path',
        'report_status',
        'uploaded_by',
    ];
}

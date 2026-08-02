<?php

namespace App\Models\Ctms\Decisions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;
use App\Models\Ctms\Patietn;

class Enrollment extends Model
{
    //
    use HasFactory;
    use HasRoles;


    protected $table = 'enrollments';

    protected $primaryKey = 'enrollment_id';

    protected $fillable = [
        'enrollment_id',
        'patient_uuid',
        'opd_id',

        'discectomy_ipd_id', 
        'discectomy_admission_date',
        'discectomy_date',
        'surgeons_names',
        'discectomy_other_info',
        'discectomy_comments',
        'disc_info_entered_by',
        'disc_info_date_entered',

        'discectomy_sample_desc',
        'discectomy_sample_number',
        'discectomy_sample_comments',
        'discectomy_sample_info_entered_by',
        'discectomy_sample_info_date_entered',

        'qc_report1_filename',
        'qc_report1_file_path',
        'qc_report2_filename',
        'qc_report2_file_path',
        'qc_report3_filename',
        'qc_report3_file_path',
        'qc_report4_filename',
        'qc_report4_file_path',
        'qc_coa_filename',
        'qc_coa_file_path',
        'qc_other_infos',
        'qc_enrollment_comment',
        'qc_infos_entered_by',
        'qc_infos_date_entered',

        'qa_other_infos',
        'qa_enrollment_comment',
        'qa_infos_entered_by',
        'qa_infos_date_entered',

        'enrollment_decision',
        'decision_comment',
        'decision_entered_by',
        'decision_date_entered',

        'patient_unique_id',
        'mbr_id',
        'linked_sample_id',
        'other_infos',
        'administrative_comment',

        'transplantation_date',
        'transplantation_info',
        'transplantation_comments',
        'transplant_info_entered_by',
        'transplant_info_date_entered',
    ];

	public function patient()
    {
      return $this->hasOne(Patient::class, 'patient_uuid', 'patient_uuid');
    }

}

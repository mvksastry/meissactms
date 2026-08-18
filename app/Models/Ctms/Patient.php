<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Ctms\Decisions\Enrollment;
use App\Traits\TCommentAppender;

class Patient extends Model
{
    use TCommentAppender;
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'patients';

    protected $primaryKey = 'patient_id';
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'patient_uuid', 

        'center_id',
        'ctarm_id',

        'opd_id', 
        'in_patient_id',
        'admission_date',
        'subject_id',
 

        'ob_initiated_by',
        'ob_initiated_role',
        'ob_start_date',
        'ob_approved_by',
        'ob_approval_role',
        'ob_approval_comment',
        'ob_status',

        'aadhar_id',
        'pan_num',
        'other_id',
        'name',
        'nick_name',
        'alias_name',
        'gender',
        'date_of_birth',
        'age',
        'present_occupation',
        'primary_phone_number',
        'alternate_phone_number',
        'address',
        'land_mark',
        'taluka_haveli',
        'state',

        'emergency_contact_name',   
        'emergency_contact_phone',
        'alternate_contact_name',
        'alternate_contact_phone',

        'height',
        'height_unit',
        'weight',
        'weight_unit',
        'bmi',

        'consent_status',
        'consent_date',
        'consent_av',
        'consent_approval_date',
        'consent_approval_reference',
        'consent_approval_file',
        
        'gen_surgical_info',
        'surgery_at_lumbar',
        'malignancies',
        'general_medical_history',
        'infections_suffered',
        'general_inflammatory_diseases',
        'ankylosing_spondylosis',
        'rheumatoid_arthritis',
        'chronic_kidney_issues',
        'chronic_liver_issues',
        'hiv',
        'aids',
        'hepatitis_b',
        'hepatitis_c',
        'diabetes_mellitus_self',
        'diabetes_mellitus_family',
        'hypertension_self',
        'hypertension_family',
        'ihd_self',
        'ihd_family',
        'paralysis_self',
        'paralysis_family',
        'consumption_non_tgp',
        'consumption_tobacco',
        'consumption_gutka',
        'consumption_pan',
        'anyother_habbits',
        'past_complaints',
        'present_complaints',
        'past_medications',
        'present_medications',
        'addictive_substance_use',
        'non_addictive_substance_use',
        'past_history',
        'notable_family_history',
        'before_problem_occupation',
        'general_habits',

        'status_code',
        'status',
        'status_date',

        'comment_entered_by',
        'entered_by',
        'entry_date',

        'comment_verified_by',
        'verified_by',
        'verified_date',

        'comment_approved_by',
        'approved_by',
        'approved_date',

        'comment_cro',
        'cro_approval',
        'cro_approval_date',

        'comment_sealed_by',
        'sealed_by',
        'sealed_date',

        'closure_code',
        'closure_comment',
        'date_closed',
        'closed_by',
        'final_status',
        'closure_auth_by',
        'closure_auth_role',
        'closure_auth_date',
    ];

	public function enrolled()
    {
      return $this->hasOne(Enrollment::class, 'patient_uuid', 'patient_uuid');
    }

	public function lifestyle()
  {
    return $this->hasMany(LifeStyle::class, 'patient_uuid', 'patient_uuid');
  }
}

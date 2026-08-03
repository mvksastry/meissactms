<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;
use App\Models\Ctms\Decisions\Enrollment;

class Activity extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'ctms_activities';

    protected $primaryKey = 'ctms_activity_id';

    protected $fillable = [
        'uuid',
        'incharge_id',
        'leader_id',
        'patient_uuid', //which is good ? Patient id or Enrollment id, enrollment Id is better?
        'enrollment_id', // Foreign Key to enrollment table
        'name',
        'description',
        'start_date',
        'end_date',
        'date_approved',
        'approval_ref',
        'budget_total',
        'budget_equipment',
        'budget_consumable',
        'budget_contigency',
        'comments',
        'activity_file',
        'sanction_file',
        'activity_file_path',
        'sanction_file_path',

        'status',
        'status_date',

        'notes',

        'mbr_id', // Foreign Key -- link to enrollment table where first time mbr_id created Foreign Key
        'chondcyte_production_id',  // Foreign Key -- the mbr_id associated chondrocyte production bmr_id this Foreign Key
        'auplmed_production_id', // Foreign Key -- the mbr_id associated aupl media production id Foreign Key

        'comment_entered_by',
        'entered_by',
        'entry_date',

        'comment_verified_by',
        'verified_by',
        'verified_date',

        'comment_sealed_by',
        'sealed_by',
        'sealed_date',
        
        'created_at',
        'updated_at',       
    ];

    public function incharge()
	{
		return $this->hasOne(User::class, 'id', 'incharge_id');
	}

    public function leader()
	{
		return $this->hasOne(User::class, 'id', 'leader_id');
	}

    public function enrolled()
	{
		return $this->hasOne(Enrollment::class, 'enrollment_id', 'enrollment_id');
	}
}

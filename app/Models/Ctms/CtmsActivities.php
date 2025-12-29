<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class CtmsActivities extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'ctms_activities';

    protected $primaryKey = 'ctms_activity_id';

    protected $fillable = [
        'uuid',
        'incharge_id',
        'pi_id',
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
        'research_project_file',
        'sanction_letter_file',
        'project_file_path',
        'sanction_file_path',

        'status',
        'status_date',

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

}

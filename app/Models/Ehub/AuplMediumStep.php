<?php

namespace App\Models\Ehub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AuplMediumStep extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'aupl_medium_steps';

    protected $primaryKey = 'aupl_medium_step_id';

    protected $fillable = [
        'step_seq_no', 
        'child_seq_no',
        'description',
        'enter_details',
        'status',
        'issue_date',	
        'prepared_by',	
        'reviewed_by',	
        'approved_by',	
        'version_no',	
        'amendment_no',	
        'amendement_date',
    ];
}

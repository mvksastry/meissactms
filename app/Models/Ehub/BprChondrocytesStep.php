<?php

namespace App\Models\Ehub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class BprChondrocytesStep extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'bpr_chondrocytes_steps';

    protected $primaryKey = 'bpr_chondrocyte_step_id';

    protected $fillable = [
        'step_seq_no', 
        'child_seq_no',
        'description',	
        'enter_details',
        'star',
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

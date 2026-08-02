<?php

namespace App\Models\Ehub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class ChondcyteProduction extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'chondcyte_productions';

    protected $primaryKey = 'chondcyte_production_id';

    protected $fillable = [
        'ctms_activity_id',
        'assigned_by',
        'assigned_date',
        'team_ids',
        'completed_stages', 
        'current_stage',
        'comments',
        'date_completed',
        'status',
        'status_date',
        'incharge_id',
    ];
}

<?php

namespace App\Models\Ehub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Ctms\Activity;
use App\Models\User;

class AuplMediaProduction extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'auplmedia_productions';

    protected $primaryKey = 'auplmed_production_id';

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

    public function assigned()
    {
      return $this->hasOne(User::class, 'id', 'assigned_by');
    }

    public function ctmsinfo()
    {
      return $this->hasOne(Activity::class, 'ctms_activity_id', 'ctms_activity_id');
    }
}

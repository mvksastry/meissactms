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
        'incharge_id',
        'completed_stages', 
        'current_stage',

        'mfg_erecord', 
        'start_date',
        'date_completed',

        'comments_mfg_asst',
        'mfg_asst_name',
        'mfg_asst_decision_date',
        
        'comments_mfg_incharge',
        'mfg_incharge_name',
        'incharge_decision_date',

        'comments_ctms_incharge',

        'status',
        'status_date',
        
        'file_name',
        'file_path',
        'uploaded_by',
        'date_uploaded',
        
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

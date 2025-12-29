<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class ActivityAssent extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'ctms_activities';

    protected $primaryKey = 'ctms_activity_id';

    protected $fillable = [
        'ctms_activity_id',
		'allowed_id',
		'start_date',
		'end_date',
		'notebook',
		'status',
    ];

    public function allowed()
    {
      return $this->hasOne(User::class, 'id', 'allowed_id');
    }

	public function CtmsActivities()
    {
      return $this->hasOne(CtmsActivity::class, 'ctms_activity_id', 'ctms_activity_id');
    }
	
	public function activities()
    {
      return $this->hasMany(CtmsActivities::class, 'ctms_acitivity_id', 'ctms_acitivity_id');
    }

}

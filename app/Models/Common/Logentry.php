<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Common\Infrastructure;
use App\Models\User;

class Logentry extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'logentries';

    protected $primaryKey = 'logentry_id';

    protected $fillable = [
        'infra_id',
		'start_hour',
		'start_min',  
		'end_hour',   
		'end_min',    
		'accessories',
		'user_id', 
		'status',  
		'remarks'
    ];

    public function infra()
    {
      return $this->hasOne(Infrastructure::class, 'infra_id', 'infra_id');
    }
	 
	 public function user()
    {
      return $this->hasOne(User::class, 'id', 'user_id');
    }
}

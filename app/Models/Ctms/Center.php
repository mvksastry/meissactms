<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Center extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'centers';

    protected $primaryKey = 'center_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'name',
        'uuid',
        'category',
        'description',
        'location',
        'total_size',
        'total_count',
        'notes',
        'incharge_name',
        'status',
        'notes',
        
        'created_at',
        'updated_at',
    ];


}

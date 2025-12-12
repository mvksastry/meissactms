<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Clinic extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'clinics';

    protected $primaryKey = 'clinic_id';

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
        'incharge_name',
        'status',
        'notes',
        'created_at',
        'updated_at'
    ];
}

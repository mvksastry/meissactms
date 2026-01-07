<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NCAuditTrail extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'nc_audit_trails';

    protected $primaryKey = 'nc_audit_trail_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'record_type',
      'nc_id',
      'action',
      'old_value',
      'new_value'
    ];
}

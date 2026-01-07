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
      'record_id',
      'nc_id',
      'nc_uuid',
      'action',
      'performed_by',
      'role_performed',
      'performed_at',
      'old_value',
      'new_value'
    ];
}

<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NonConformity extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'non_conformities';

    protected $primaryKey = 'nc_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'nc_uuid',
      'origin_of_nc',
      'raised_how',
      'raised_by',
      'raised_role',
      'raised_at',
      'assigned_division',
      'description',
      'current_status',
      'requires_capa',
      'linked_capa_id'
    ];
}

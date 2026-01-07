<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Capas extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'capas';

    protected $primaryKey = 'capa_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'capa_uuid',
      'capa_type',
      'reference_no',
      'nc_id',
      'issue_description',
      'root_cause', 
      'action_plan',
      'reported_by',
      'responsible_user_id',
      'target_date',
      'closure_date',
      'capa_status'
    ];
}

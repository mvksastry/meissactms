<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NCStatusHistory extends Model
{
    //\
    use HasFactory;
    use HasRoles;

    protected $table = 'nc_status_history';

    protected $primaryKey = 'nc_status_history_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'nc_id',
      'from_status',
      'to_status',
      'changed_by',
      'change_reason'
    ];
}

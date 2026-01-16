<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NCComms extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'nc_communications';

    protected $primaryKey = 'nc_com_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'nc_id',
      'message_type',
      'message',
      'entered_by',
      'entered_role',
      'visible_to'
    ];
}

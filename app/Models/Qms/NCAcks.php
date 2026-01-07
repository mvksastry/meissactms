<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NCAcks extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'nc_acknowledgements';

    protected $primaryKey = 'nc_ack_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'nc_id',
      'ack_by',
      'ack_at',
      'remarks',
      'entered_by',
      'entered_role'
    ];
}

<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class ActionEffectiveCheck extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'action_effectiveness_checks';

    protected $primaryKey = 'id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
    'action_type',
    'action_id',
    'check_description',
    'check_method',
    'checked_by',
    'checked_at',
    'result',
    'evidence'
    ];
}

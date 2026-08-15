<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

/*
class BaseModel extends Model
{
    //
}
*/
abstract class BaseModel extends Model implements AuditableContract
{
    use Auditable;

    // Common settings for all models
    protected $guarded = []; // No mass-assignment restrictions by default
}
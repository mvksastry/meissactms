<?php

namespace App\Models\Pmc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Division extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'divisions';

    protected $primaryKey = 'division_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'name',
        'description',
        'status',
        'status_date',
        'created_by',
    ];
}

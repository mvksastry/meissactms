<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Maintenance extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'maintenance';

    protected $primaryKey = 'maintenance_id';

    protected $fillable = [

        'supervisor',
        'infra_id',
        'type',
        'done_date',
        'description',
        'filename'
    ];
}

<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Infrastructure extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'infrastructure';

    protected $primaryKey = 'infra_id';

    protected $fillable = [

        'name',
        'nickName',
        'description',
        'date_acquired',
        'make',
        'model',
        'vendor_address',
        'vendor_phone',
        'vendor_email',
        'building',
        'floor',
        'room',
        'amc',
        'amc_start',
        'amc_end',
        'status',
        'date_disposal',
        'disposal_mode',
        'supervisor',
    ];
}

<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//models
use App\Models\User;

class Template extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'ctms_templates';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'template_code',
        'file_uuid',
        'template',
        'tags',
        'file_name',
        'file_path',
        'status_date',
        'uploaded_by',
        'created_uuid',
        'approved_name',
        'approved_uuid',
        'approved_date'
    ];
}

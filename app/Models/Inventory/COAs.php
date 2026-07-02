<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class COAs extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'certificate_analyses';

    protected $primaryKey = 'coa_id';

    protected $fillable = [
        'product_id',
        'file_code', 
        'file_uuid',     
        'coa_category',
        'coa_description',
        'tags',
        'file_name',
        'file_path',
        'coa_status',
        'uploaded_by',
        'created_uuid',
        'date_created',
        'approved_name',
        'approved_uuid',
        'approved_date',
    ];

}

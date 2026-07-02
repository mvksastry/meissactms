<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Tempproduct extends Model
{
    //
    use HasFactory;
    use HasRoles;
    protected $table = 'tempproducts';

    protected $primaryKey = 'temp_product_id';

    protected $fillable = [
        'pack_mark_code',
        'category_id',
        'resproject_id',
        'grade',
        'catalog_id',
        'name',
        'pack_size',
        'unit_id',
        'num_packs',
        'mfd_date',
        'batch_code',
        'vial_cost',
        'item_currency',
        'item_cost',
        'expiry_date',
        'supplier_id',
        'status_open_unopened',
        'status_date',
        'quantity_left',
        'full_empty',
        'storage_container_id',
        'shelf_rack_id',
        'box_id',
        'box_position_id',
        'open_storage',
        'enteredby_id',
        'date_entered',

        'office_review', //newly added for easy import of data
        'off_rev_date',  //date done

        'product_file',
        'product_file_path',
        'notes'
    ];
}

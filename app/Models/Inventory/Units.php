<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Units extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'units';

    protected $primaryKey = 'unit_id';
    
    protected $fillable = [
		'symbol',
		'symbol_add', 
		'description',
	];
}

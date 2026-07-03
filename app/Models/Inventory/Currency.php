<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Currency extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'currencies';

    protected $primaryKey = 'currency_id';
    
    protected $fillable = [
        'code',
        'symbol',
        'description',
    ];
}

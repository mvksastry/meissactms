<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Categories extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [

        'name',
        'description',
        'created_at',
        'updated_at'
    ];
}

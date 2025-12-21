<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
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
        'uuid',
        'name',
        'description',
        'category_folder',
        'created_by',
        'created_date',
        'status',
        'notes',
        'created_at',
        'updated_at'
    ];
}

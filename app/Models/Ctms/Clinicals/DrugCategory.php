<?php

namespace App\Models\Ctms\Clinicals;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class DrugCategory extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'drug_categories';

    protected $primaryKey = 'drug_category_id';

    protected $fillable = [
        'category_name', 
        'description',
        'posted_by',         
    ];

}

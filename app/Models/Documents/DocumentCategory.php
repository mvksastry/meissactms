<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class DocumentCategory extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'document_categories';

    protected $primaryKey = 'doc_category_id';

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
        'created_date',
        'status',
        'notes',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Document extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'documents';

    protected $primaryKey = 'document_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'document_id',
        'document_uuid',
        'category_id',
        'title',
        'summary',
        'tags',
        'doc_status',
        'user_id',
        'created_name',
        'created_uuid',
        'date_created',
        'approved_name',
        'approved_uuid',
        'approved_date',
        'sealed_name',
        'sealed_uuid',
        'date_sealed',
        'effective_date'
    ];

    public function category()
    {
      return $this->hasMany(Category::class, 'category_id', 'category_id');
    }

    public function doc_versions()
    {
        return $this->hasMany(DocumentVersion::class, 'document_id', 'document_id');
    }
}

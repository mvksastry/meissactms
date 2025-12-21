<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class DocumentVersion extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'document_versions';

    protected $primaryKey = 'doc_version_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'document_id',
        'version_number',
        'content',
        'is_active',
        'obsolete_at',
        'obsolete_by',
        'created_by',
        'supersedes_version_id',
        'superseded_by_version_id',
        'filename',
        'file_path'
    ];

    public function document()
    {
        return $this->hasOne(Document::class, 'document_id', 'document_id');
    }
}

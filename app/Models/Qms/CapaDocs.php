<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class CapaDocs extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'capa_attachments';

    protected $primaryKey = 'capa_attachment_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'capa_id',
      'capa_uuid',
      'capa_file_name',
      'capa_file_path',
      'uploaded_by'
    ];
}

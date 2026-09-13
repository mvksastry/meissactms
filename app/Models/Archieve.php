<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Ctms\Decisions\Enrollment;
use App\Traits\TCommentAppender;


class Archieve extends Model
{
    //
    use TCommentAppender;
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'archieves';

    protected $primaryKey = 'archieve_id';
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'patient_uuid', 
        'description',
        'archieved_by',
        'date_archieved',
        'filename',
        'file_path',
        'accessed_by',
        'date_accessed'
    ];

	public function enrolled()
    {
      return $this->hasOne(Enrollment::class, 'patient_uuid', 'patient_uuid');
    }    
}

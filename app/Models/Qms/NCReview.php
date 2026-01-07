<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NCReview extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'nc_reviews';

    protected $primaryKey = 'nc_review_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'nc_id',
      'review_stage',
      'summary',
      'capa_required',
      'reviewed_by',
      'reviewed_at',
      'locked',
      'locked_by',
      'locked_on'
    ];
}

<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class CapaReview extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'capa_effectiveness_reviews';

    protected $primaryKey = 'capa_effectiveness_review_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'capa_id',
      'review_comments',
      'is_effective',
      'review_date',
      'review_comment',
      'reviewed_by',
      'reviewed_role'
    ];
}

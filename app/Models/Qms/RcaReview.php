<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RcaReview extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'rca_reviews';

    protected $primaryKey = 'rca_review_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'root_cause_analysis_id',
      'comment',
      'reviewed_by',
      'reviewed_at'
    ];
}

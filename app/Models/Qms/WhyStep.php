<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class WhyStep extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'why_steps';

    protected $primaryKey = 'id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'root_cause_analysis_id',
      'sequence_no',      //-- 1, 2, 3, ...
      'why_question',
      'answer',
      //-- Optional but powerful
      'evidence_reference',
      'created_by'
    ];
}

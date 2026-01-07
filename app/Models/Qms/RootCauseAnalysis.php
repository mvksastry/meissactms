<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RootCauseAnalysis extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'root_cause_analyses';

    protected $primaryKey = 'id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      //-- Context
      'nc_id',
      'capa_id',
      'deviation_id',
      'related_type',   //-- 'nc', 'capa', 'deviation'
      'related_id',
      'analysis_method',
      //-- Lifecycle
      'status',
      //-- Conclusions
      'final_root_cause',
      //-- Authority
      'created_by',
      'approved_by',
      'approved_at',
      //-- Control
      'locked'
    ];
}

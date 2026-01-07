<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class PreventiveAction extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'preventive_actions';

    protected $primaryKey = 'id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'capa_id',
      'root_cause_analysis_id',
      'action_description',
      //-- Responsibility & timing
      'assigned_to',
      'target_completion_date',
      //-- Lifecycle
      'status',
      //-- Completion
      'completed_at',
      'completion_evidence',
      //-- Authority
      'created_by',
      'approved_by',
      'approved_at'
    ];
}

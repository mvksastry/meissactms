<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Capas extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'capas';

    protected $primaryKey = 'capa_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'capa_uuid',
      'capa_type',
      'reference_no',
      'nc_id',
      'issue_description',
      'root_cause', 
      'action_plan',
      'reported_by',
      'responsible_user_id',
      'target_date',
      'closure_date',
      'capa_status'
    ];

    public function capa_review()
    {
        return $this->hasMany(CapaReview::class, 'nc_id', 'nc_id');
    }

    public function capa_docs()
    {
        return $this->hasMany(CapaDocs::class, 'nc_id', 'nc_id');
    }

    public function action_eff_check()
    {
        return $this->hasMany(ActionEffectiveCheck::class, 'nc_id', 'nc_id');
    }    

    public function rca_details()
    {
        return $this->hasMany(RootCauseAnalysis::class, 'nc_id', 'nc_id');
    } 

    public function capa_status_history()
    {
        return $this->hasMany(CapaStatusHistory::class, 'nc_id', 'nc_id');
    }

    public function corrective_action()
    {
        return $this->hasMany(CorrectiveAction::class, 'nc_id', 'nc_id');
    }

    public function preventive_action()
    {
        return $this->hasMany(PreventiveAction::class, 'nc_id', 'nc_id');
    }
}

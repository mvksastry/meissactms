<?php

namespace App\Models\Qms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class NonConformity extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'non_conformities';

    protected $primaryKey = 'nc_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
      'nc_uuid',
      'origin_of_nc',
      'division_reported',
      'raised_by',
      'raised_role',
      'raised_at',
      'assigned_division',
      'description',
      'current_status',
      'requires_capa',
      'linked_capa_id'
    ];

    public function acks()
    {
        return $this->hasMany(NCAcks::class, 'nc_id', 'nc_id');
    }

    public function history()
    {
        return $this->hasMany(NCStatusHistory::class, 'nc_id', 'nc_id');
    }

    public function review()
    {
        return $this->hasMany(NCReview::class, 'nc_id', 'nc_id');
    }

    public function communs()
    {
        return $this->hasMany(NCComms::class, 'nc_id', 'nc_id');
    }

    public function audits()
    {
        return $this->hasMany(NCAuditTrail::class, 'nc_id', 'nc_id');
    }
}

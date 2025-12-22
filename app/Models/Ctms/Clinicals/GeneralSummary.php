<?php

namespace App\Models\Ctms\Clinicals;

use Illuminate\Database\Eloquent\Model;

class GeneralSummary extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'general_summary';

    protected $primaryKey = 'general_summary_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'patient_uuid',                          

        'opd_id', 
        'in_patient_id',
        'admission_date', 

        'general_summary',

        'status',
        'status_date',

        'comment_entered_by',
        'entered_by',
        'entry_date',

        'comment_verified_by',
        'verified_by',
        'verified_date',

        'comment_cro',
        'cro_approval',
        'cro_approval_date',

        'comment_sealed_by',
        'sealed_by',
        'sealed_date',
        
        'created_at',
        'updated_at',
    ];
}

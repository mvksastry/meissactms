<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RMQReply extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'roland_morris_questions';

    protected $primaryKey = 'rmq_id';

    protected $fillable = [

        'patient_uuid',
        'center_id',
        'ctarm_id',
        'opd_id',
        'in_patient_id',
        'admission_date',
        'aadhar_id',
        'pan_num',
        'other_id',
        'rmq_replies',
        'status',

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

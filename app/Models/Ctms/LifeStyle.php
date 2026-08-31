<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\TCommentAppender;

class LifeStyle extends Model
{
    use TCommentAppender;
    use HasFactory;
    use HasRoles;

    protected $table = 'patient_life_style';

    protected $primaryKey = 'patient_lifestyle_id';

    protected $fillable = [
        'patient_uuid',                          
        'center_id',

        'opd_id',
        'in_patient_id',
        'admission_date', 
        'data_type',
        
        'cross_leg_sitting', 
        'standing',
        'sitting',
        'Ls3', 
        'Ls4', 
        'Ls5', 
        'ls6', 
        'life_style_description',

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
        'sealed_date'
    ];
}

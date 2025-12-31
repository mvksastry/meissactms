<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class PatientEpoch extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'patient_timelines';

    protected $primaryKey = ' patient_timeline_id';
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'event',
        'event_date',
        'event_author',
        'author_message',
        'reply_message',
        'reply_author',
        'reply_date',
        'status',
    ];
}

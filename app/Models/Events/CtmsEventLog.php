<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;
class CtmsEventLog extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'ctms_event_logs';

    protected $primaryKey = 'ctms_event_log_id';

    protected $fillable = [
        
        'event_name',
        'payload'
    ];
}

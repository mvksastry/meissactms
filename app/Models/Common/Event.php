<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Event extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        
        'title',
        'description',
        
        'start_date',
        'start_hour',
        'start_min',
        'end_date',
        'end_hour',
        'end_min',
        'resource_id',
        'priority',
        'created_by'
    ];
}

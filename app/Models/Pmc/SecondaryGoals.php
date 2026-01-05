<?php

namespace App\Models\Pmc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class SecondaryGoals extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'sub_goals';

    protected $primaryKey = 'sub_goal_id';
    
    protected $fillable = [
        'goal_id',
        'title',
        'description',
        'measurable',
        'due_date',
        'progress',
        'status'
    ];
}

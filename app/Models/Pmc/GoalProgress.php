<?php

namespace App\Models\Pmc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class GoalProgress extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'goal_progress_logs';

    protected $primaryKey = 'log_id';

    protected $fillable = [
        'goal_id',
        'progress',
        'note',
        'logged_at'
    ];
}

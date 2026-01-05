<?php

namespace App\Models\Pmc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Goals extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'goals';

    protected $primaryKey = 'goal_id';

    protected $fillable = [
        'user_id',
        'division_id',
        'title',
        'description',
        'specific',
        'measurability',
        'achievability',
        'relevancy',
        'time_bound',
        'start_date',
        'end_date',
        'weightage',
        'progress',
        'status',
        'priority',
        'punched_by',
        'date_punched',
        'approved_by',
        'date_approved',
        'sealed_by',
        'dated_sealed'
    ];

    public function goalProgress()
    {
        return $this->hasMany(GoalProgress::class, 'goal_id', 'goal_id');
    }
}

<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Pmc\Division;
use App\Models\Pmc\GoalCategory;
use App\Models\Pmc\Goals;
use App\Models\Pmc\SubGoals;
use App\Models\Pmc\GoalProgress;

//framework
use File;
use Validator;
use Log;
use Carbon\Carbon;
use Illuminate\Log\Logger;

use App\Traits\Base;

class GoalProgressLogs extends Component
{
    //panels
    public $sys_panel, $msg_panel, $goalProgressUpdatePanel=false;

    public $annualGoals;

    public $empGoals;

    public $goal = [];

    public $goalId, $goal_title = null, $progress_percent;

    public function render()
    {
        $this->fnShowEmployeeGoals();
        return view('livewire.projects.goal-progress-logs');
    }

    public function fnShowEmployeeGoals()
    {
        $this->empGoals = Goals::where('user_id', Auth::id())->get();
        //dd($this->empGoals);
    }

    public function fnUpdateProgress($goal_id)
    {
        //dd($goal_id);
        $this->goalId = $goal_id;
        foreach($this->empGoals as $row)
        {
            if($row->goal_id == $goal_id)
            {
                
                $this->goal_title = $row->title;
            }
        }
        $this->goal = [];
        $this->goalProgressUpdatePanel = true;
    }

    public function fnSaveGoalProgress()
    {
        //dd($this->goal);
        $maxProgress = GoalProgress::where('goal_id', $this->goalId)->max('progress');
        //dd($maxProgress);
        $nUGP = new GoalProgress();
        $nUGP->goal_id = $this->goalId;
        $nUGP->note = $this->goal['notes'];

        if($maxProgress >= (float)$this->goal['progress_percent'])
        {
            $nUGP->progress = $maxProgress;
        }
        else {
            $nUGP->progress = (float)$this->goal['progress_percent'];
        }

        //dd($nUGP);
        $nUGP->save();
        //now update the goal table
        $nUG = Goals::where('goal_id', $this->goalId)->first();
        //make sure, if goal progress percent less than already entered
        if( (float)$this->goal['progress_percent'] > (float)$nUG->progress )
        {
            $nUG->progress = (float)$this->goal['progress_percent'];
            $nUG->save();
        }
        $this->goal = [];
        $this->goalProgressUpdatePanel = false;
    }
}

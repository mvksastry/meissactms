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

use App\Models\User;

//framework
use File;
use Validator;
use Log;
use Carbon\Carbon;
use Illuminate\Log\Logger;
use App\Traits\Base;

class EmployeeAnnualGoals extends Component
{
    //panels
    public $sys_panel, $msg_panel;

    public $annualGoals;

    public $employees, $empGoals;

    //form variables
    public $divs, $employee_name;

    public $show, $closeGoalPanel = true;

    public $new_div_name, $new_div_desc;

    public $goal =[];


    public function render()
    {
        
        $this->divs = Division::all();
        $this->goal['employee_name'] = Auth::user()->name;

        $id = Auth::id();
        $this->fnShowEmployeeGoals($id);
        return view('livewire.projects.employee-annual-goals');
    }

    public function fnShowEmployeeGoals($id)
    {
        $this->empGoals = Goals::where('user_id', $id)->get();
        if(count($this->empGoals) > config('constants.MAX_GOALS') )
        {
            $this->closeGoalPanel = false;
        }
    }

    public function fnSaveAnnualGoal()
    {
        //dd($this->goal);

        $nG = new Goals();
        $nG->user_id = Auth::id();
        $nG->division_id = $this->goal['div_id'];
        $nG->title = $this->goal['title'];
        $nG->description = $this->goal['desc'];
        $nG->specific = $this->goal['specificity'];
        $nG->measurability = $this->goal['measurability'];
        $nG->achievability = $this->goal['achievability'];
        $nG->relevancy = $this->goal['relevancy'];
        $nG->time_bound = $this->goal['end_date'];
        $nG->start_date = $this->goal['start_date'];
        $nG->end_date = $this->goal['end_date'];
        $nG->weightage = $this->goal['weightage'];
        $nG->status = 'not_started';
        $nG->priority = $this->goal['priority'];
        $nG->punched_by = Auth::user()->name;
        $nG->date_punched = date('Y-m-d');
        
        //dd($nG);
        $nG->save();
        $this->fnShowEmployeeGoals(Auth::id());
        $nG = null;
        $this->fnResetFormFields();
    }

    public function fnResetFormFields()
    {
        $this->goal['title'] = null;
        $this->goal['desc'] = null;
        $this->goal['specificity'] = null;
        $this->goal['measurability'] = null;
        $this->goal['achievability'] = null;
        $this->goal['relevancy'] = null;
        $this->goal['end_date'] = null;
        $this->goal['start_date'] = null;
        $this->goal['end_date'] = null;
        $this->goal['weightage'] = null;
    }
}

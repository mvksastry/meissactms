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

class ProjectGoals extends Component
{
    //panels
    public $sys_panel, $msg_panel;

    public $annualGoals;

    public $employees, $empGoals, $empSelected;

    public $show;

    public $new_div_name, $new_div_desc;

    public function render()
    {
        $today = date('Y-m-d');
        $this->employees = User::all();
        //dd($employees);
        return view('livewire.projects.project-goals');
    }

    public function fnShowEmployeeGoals($id)
    {
        //dd($id);
        $this->empSelected = User::where('id', $id)->first();
        $this->empGoals = Goals::with('goalProgress')->where('user_id', $id)->get();
        //dd($this->empGoals);
    }
}

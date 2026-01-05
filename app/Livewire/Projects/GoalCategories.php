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

class GoalCategories extends Component
{
    //panels
    public $sys_panel, $msg_panel;

    public $divs;

    public $edit_button;

    public $new_div_name, $new_div_desc;

    public function render()
    {
        $this->divs = GoalCategory::where('status', 'active')->get();
        //dd($divs);
        return view('livewire.projects.goal-categories');
    }

    public function fnSaveNewDivision()
    {
        $nDiv = new GoalCategory();
        $nDiv->name = $this->new_div_name;
        $nDiv->description = $this->new_div_desc;
        $nDiv->status = 'active';
        $nDiv->status_date = date('Y-m-d');
        $nDiv->created_by = Auth::user()->name;
        //dd($nDiv);
        $nDiv->save();
        $ndiv = null;
        $this->new_div_name = null;
        $this->new_div_desc = null;
        $this->divs = GoalCategory::where('status', 'active')->get();
    }
}

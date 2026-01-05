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
use App\Models\Pmc\SecondaryGoals;
use App\Models\Pmc\GoalProgress;

//framework
use File;
use Validator;
use Log;
use Carbon\Carbon;
use Illuminate\Log\Logger;

use App\Traits\Base;

class SubGoals extends Component
{
    public function render()
    {
        return view('livewire.projects.sub-goals');
    }
}

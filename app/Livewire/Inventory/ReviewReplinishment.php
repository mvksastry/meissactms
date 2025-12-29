<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//models
use App\Models\Inventory\Categories;
use App\Models\Inventory\Products;
use App\Models\Inventory\Consumption;

// Log trails recorder
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;

class ReviewReplinishment extends Component
{
    //swal messages
	public $message;
    
    public $categories;

    public function render()
    {
        $this->categories = Categories::all();
        return view('livewire.inventory.review-replinishment');
    }
}

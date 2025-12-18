<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//use App\Traits\Base;

class HomeController extends Controller
{
    //
    //use Base;
	use HasRoles;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if( Auth::user()->hasAnyRole(['ctms_incharge', 'director']) )
		{
            return view('layouts.home.ctms.admin.home');
        }

        if( Auth::user()->hasAnyRole('researcher') )
		{
            return view('home');
        }
    }

    public function no_subscription()
    {   
        return view('subscription.no-subscription-notice');
    }


}

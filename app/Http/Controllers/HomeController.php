<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//Traits
use App\Traits\Base;
use App\Traits\TCtms\TDashboard;

class HomeController extends Controller
{
    //
    use HasRoles;

    use Base;
    use TDashboard;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if( Auth::user()->hasAnyRole(['ctms_incharge', 'director']) )
		{
            $chats = $this->getAllUnseenChats();
            $all_centers = $this->getAllCenters();
            $all_clinics = $this->getAllClinics();
            $pwds = $this->getPatientDataDraftStatus();
            $pwas = $this->getPatientDataActiveStatus();
            //dd($pwds);
            return view('layouts.home.ctms.admin.home')->with([
                'all_centers' => $all_centers,
                'all_clinics' => $all_clinics,
                'pwds' => $pwds,
                'pwas' => $pwas,
                'chats' => $chats
            ]);
        }

        return view('norole.no-role-home');
    }

    public function no_subscription()
    {   
        return view('subscription.no-subscription-notice');
    }


}

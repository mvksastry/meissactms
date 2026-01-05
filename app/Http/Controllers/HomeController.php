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

        $timetag = date("Y-m-d H:i:s");
		//check for expired/suspended account
		$exp = strtotime(Auth::user()->expiry_date);
		$tod = strtotime(date('Y-m-d'));
        //dd($timetag);
		if( $exp < $tod)
		{
		    $msg = "Your Account Expired on [ ".date('d-m-Y', strtotime(Auth::user()->expiry_date))." ] Contact Service Provider";
 			//return  view('norole.noroleHome');
 			Log::channel('activity')->info('Logged in user [ '.Auth::user()->name.' ] account expired');
 			return  view('layouts.errors.account_expired')->with('msg', $msg);
		}
		
		// First login change password done here
		$flogin = Auth::user()->first_login;
		$last_pw_change = Auth::user()->last_pwchange;
		//dd($flogin, $last_pw_change);
		if($flogin == null)
		{
			//update first_login with datetime
			$result = User::where('email', Auth::user()->email)->update([
                       'first_login' => date('Y-m-d')]);
		}
		//$today = date('Y-m-d');
		$end_date = date('Y-m-d', strtotime("-60 days"));
		if($last_pw_change == null || $end_date > $last_pw_change)
		{
			//return redirect()->route('password.reset');
		}
		
		// all is well from here on

		//$user = Auth::user();
        //$roles = $user->getRoleNames();
		//dd($roles);
        //$groupTasks = $this->groupsTasks();
        //$personalTasks = $this->personalTasks();
        //$kbCards = Kanbancards::where('posted_by', Auth::user()->name)->get();








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

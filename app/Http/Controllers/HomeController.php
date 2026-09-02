<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;

// Models
use App\Models\User;

//Traits
use App\Traits\Base;

//Dashboards
use App\Traits\TCtms\TRoleL1\TL1Dash;
use App\Traits\TCtms\TDashboard;
use App\Traits\TCtms\TCroDashboard;
use App\Traits\TCtms\TProcess\TProcessDBQueries;
use App\Traits\TCtms\TQa\TQaDBQueries;
use App\Traits\TCtms\TQc\TQcDBQueries;

class HomeController extends Controller
{
    //
    use HasRoles;

    use Base;
    use TDashboard;
    use TL1Dash;
    use TCroDashboard;
    use TProcessDBQueries;
    use TQaDBQueries;
    use TQcDBQueries;

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

        if( Auth::user()->hasAnyRole(['director']) )
		{    
            $pending = $this->getAllPendingRequestsForDirector();
            $approved = $this->getAllApprovedRequestsForDirector();
            $drafts = $this->getAllDraftSatusPatientsForDirector();
            $sealed = $this->getAllSealedSatusPatientsForDirector();
            $fuPatients = $this->getAllPatientsForFollowUpForDirector();
            $allPatients = $this->getAllPatients();

            //dd($pending, );
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.director.homeDirector')->with([
                'pending' => $pending,
                'approved' => $approved,
                'drafts' => $drafts,
                'sealed'    => $sealed,
                'fuPatients' => $fuPatients,
                'allPatients' => $allPatients
            ]);
        }

        if( Auth::user()->hasAnyRole(['ctms_incharge']) )
		{
            $forApproval = $this->getAllVerifiedPatientsForInCharge();
            $fuPatients = $this->getAllPatientsForFollowUpForInCharge();
            $sealed =     $this->getAllSealedSatusPatientsForInCharge();
            $enrStatus = $this->getAllEnrollmentStatusDetails();
            $allPatients = $this->getAllPatients();
            //dd($obPatients, $fuPatients, $sealed);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.incharge.Homeincharge')->with([
            'forApproval' => $forApproval,
                'fuPatients' => $fuPatients,
                'sealed'    => $sealed,
                'enrStatus' => $enrStatus,
                'allPatients' => $allPatients
            ]);
        }

        if( Auth::user()->hasAnyRole(['clinical_manager']) )
		{
            $obPatients = $this->getPatientsWithConfirmedStatus();
            $fuPatients = $this->getAllPatientsForFollowUpForCtmsManager();
            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.clinicalmanager.home')->with([
                'obPatients' => $obPatients,
                'fuPatients' => $fuPatients
            ]);
        }

        if( Auth::user()->hasAnyRole(['qc_incharge']) )
		{
            $sealed = $this->getQCPatientsSealedStatus();
            $qcInpFlag = $this->getQCPatientsEnrollmentStatus();
            //dd($sealed, $qcInpFlag);
            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.qc.qcHome')->with([
                'sealed' => $sealed,    
                'qcInpFlag' => $qcInpFlag
            ]);
        }

        if( Auth::user()->hasAnyRole(['qa_incharge']) )
		{
            $sealed = $this->getQAPatientsSealedStatus();
            $qaInpFlag = $this->getQAPatientsEnrollmentStatus();
            //dd($sealed);
            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.qa.qaHome')->with([
                'sealed' => $sealed,    
                'qaInpFlag' => $qaInpFlag
            ]);
        }

        if( Auth::user()->hasAnyRole(['process_incharge']) )
		{
            $processFlag = $this->getPatientsWithConfirmedStatus();

            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.process.processChiefHome')->with([
                'processFlag' => $processFlag
            ]);
        }


        if( Auth::user()->hasAnyRole(['senior_resident']) )
		{
            $obPatients = $this->getAllOnBoardedPatientsForSeniorResident();
            $xfuPats = $this->getAllFollowUpPatientsForSeniorResident();
            //dd($obPatients, $xfuPats);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            //dd($obPatients, $xfuPats);
            return view('layouts.home.ctms.srresident.homeSrRes')->with([
                'obPatients' => $obPatients,
                'xfuPats' => $xfuPats
            ]);
        }

        if( Auth::user()->hasAnyRole(['junior_resident']) )
		{
            $chats = $this->getAllUnseenChats();
            $all_centers = $this->getAllCenters();
            $all_clinics = $this->getAllClinics();
            $pwds = $this->getPatientDataDraftStatus();
            $pwas = $this->getPatientDataActiveStatus();
            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.jrresident.home')->with([
                'all_centers' => $all_centers,
                'all_clinics' => $all_clinics,
                'pwds' => $pwds,
                'pwas' => $pwas,
                'chats' => $chats
            ]);
        }

        if( Auth::user()->hasAnyRole(['clinical_dataentry']) )
		{
            $chats = $this->getAllUnseenChats();
            $all_centers = $this->getAllCenters();
            $all_clinics = $this->getAllClinics();
            $pwds = $this->getPatientDataDraftStatus();
            $pwas = $this->getPatientDataActiveStatus();
            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.cde.home')->with([
                'all_centers' => $all_centers,
                'all_clinics' => $all_clinics,
                'pwds' => $pwds,
                'pwas' => $pwas,
                'chats' => $chats
            ]);
        }

        if( Auth::user()->hasAnyRole(['cro']) )
		{
            $chats = $this->getAllUnseenChats();
            $enPats = $this->getAllEnrolledActivePatientCount();
            $exPats = $this->getAllEnrolledExitedPatientCount();
            //dd($pwds);
            Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: Home Dashboard Displayed');
            return view('layouts.home.ctms.cro.home')->with([
                'chats' => $chats,
                'enPats' => $enPats,
                'exPats' => $exPats
            ]);
        }
        Log::channel('activity')->info(' User [ '.Auth::user()->name.' ] logged in: No Role Home Dashboard Displayed');
        return view('norole.no-role-home');
    }


}

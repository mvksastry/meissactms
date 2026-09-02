<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Center;
use App\Models\Common\Chat;
use App\Models\Ctms\Clinic;

use App\Models\Ctms\Decisions\Enrollment;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

trait TDashboard
{
    public function getAllCenters()
    {
        return Center::where('status', 'active')->get();
    }

    public function getAllClinics()
    {
        return Clinic::where('status', 'active')->get();
    }

    public function getPatientDataDraftStatus()
    {
        return Patient::where('status', 'draft')->get();
    }

    public function getPatientDataActiveStatus()
    {
        return Patient::where('status', 'active')->get();
    }

    public function getPatientDataExitedStatus()
    {
        return Patient::where('status', 'exited')->get();
    }

    public function getAllUnseenChats()
    {
        //return Chat::with('user')->where('is_seen', 0)->get();
        //return Chat::where('is_seen', 0)->get();
        $var = Carbon::now();
        return Chat::whereDate('created_at', '=', $var)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }



    

    //------------  Clinical Manager --------------------//
    public function getPatientsWithConfirmedStatus()
    {
        $status = ['confirmed'];
        return Patient::whereIn('status', $status)->get();
    }

    public function getAllPatientsForFollowUpForCtmsManager()
    {
        return Enrollment::Where('stage_code', '>=', 370)->get();
    }
    //-------------------------------------------------//
    



    //for in charge
    public function getAllOnBoardedPatientsForInCharge()
    {
        $status = ['verified'];
        return Patient::whereIn('status', $status)->get();
    }

    public function getAllVerifiedPatientsForInCharge()
    {
        $status = ['verified'];
        return Patient::whereIn('status', $status)->get();
    }

    public function getAllPatientsForFollowUpForInCharge()
    {
        return Enrollment::Where('stage_code', '>=', 370)->get();
    }

    public function getAllSealedSatusPatientsForInCharge()
    {
        $status = ['sealed'];
        return Patient::whereIn('status', $status)->get();

    }

    public function getAllEnrollmentStatusDetails()
    {
        return Enrollment::select('discec_status_code', 
                                'discec_sample_status_code',
                                'qc_status_code',
                                'qa_status_code',
                                'stage_code')->get();
    }





    //for director
    public function getAllPendingRequestsForDirector()
    {
        return  Patient::where('ob_status','pending')->get();
    }

    public function getAllApprovedRequestsForDirector()
    {
        $status = ['approved'];
        return Patient::whereIn('status', $status)->get();
    }

    //ready for Enrollment
    public function getAllDraftSatusPatientsForDirector()
    {
        $status = ['draft'];
        return Patient::whereIn('status', $status)->get();
    }

    public function getAllSealedSatusPatientsForDirector()
    {
        $status = ['sealed'];
        return Patient::whereIn('status', $status)->get();
    }

    //ready for follow-up
    public function getAllPatientsForFollowUpForDirector()
    {
        return Enrollment::Where('stage_code', '>=', 370)->get();
    }

    public function getAllPatients()
    {
        return Patient::with('enrolled')->get();
    }
}
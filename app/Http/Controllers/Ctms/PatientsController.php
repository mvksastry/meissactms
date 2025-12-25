<?php

namespace App\Http\Controllers\Ctms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//use App\Traits\Base;

use App\Models\Ctms\Center;
use App\Models\Ctms\Clinic;

//Traits
use App\Traits\Base;
use App\Traits\TCtms\TDashboard;

class PatientsController extends Controller
{
    use HasRoles;

    use Base;
    use TDashboard;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if( Auth::user()->hasAnyRole(['ctms_incharge','director']) )
		{   $all_centers = $this->getAllCenters();
            $pwds = $this->getPatientDataDraftStatus();
            $pwas = $this->getPatientDataActiveStatus();
            $pwes = $this->getPatientDataExitedStatus();
            return view('patients.admin.home')->with([

                'all_centers' => $all_centers,
                'pwds' => $pwds,
                'pwas' => $pwas,
                'pwes' => $pwes
            ]);;
        }

        if( Auth::user()->hasAnyRole('researcher') )
		{
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

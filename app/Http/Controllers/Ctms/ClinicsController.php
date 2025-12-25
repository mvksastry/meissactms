<?php

namespace App\Http\Controllers\Ctms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Importing laravel-permission models
use Spatie\Permission\Models;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//models
use App\Models\Ctms\Clinic;

//Traits
use App\Traits\Base;
use App\Traits\TCtms\TDashboard;

use Session;

class ClinicsController extends Controller
{
    //
    use HasRoles;

    use Base;
    use TDashboard;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $active_clinics = $this->getAllClinics();
        
        return view('clinics.index', [
            'active_clinics' => $active_clinics 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$user = User::all();
        return view('clinics.createForm',[
            //'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        //dd($input);
        $newClinic = new Clinic();
        $newClinic->clinic_uuid = Str::uuid()->toString();
        $newClinic->category = $input['category'];
        $newClinic->clinic_name = $input['name'];
        $newClinic->description = $input['description'];
        $newClinic->address = $input['address'];
        $newClinic->incharge_name = $input['incharge_name'];
        $newClinic->status = 'active';
        $newClinic->notes = 
        //dd($newClinic);
        $newClinic->save();
        
        return redirect()
            ->route('clinics.index') // Named route
            ->with('success', 'Clinic created successfully!');
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

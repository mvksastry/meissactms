<?php

namespace App\Http\Controllers\Ctms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

//Framework needs
use Auth;
use Illuminate\Support\Facades\DB;

//Importing laravel-permission models
use Spatie\Permission\Models;
use Spatie\Permission\Models\Permission;

//Import created models
use App\Models\User;
use App\Models\Ctms\Center;
use App\Models\Ctms\Clinic;


use Session;


class CentersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $centers = Center::all();
        $active = Center::where('status', 'active')->count();
        
        $inactive = Center::where('status', 'inactive')->count();
        //dd($centers, $active, $inactive);
        return view('centers.index', ['centers' => $centers, 'active'=>$active, 'inactive'=>$inactive]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $user = User::all();
        return view('centers.createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        //dd($input);
        $newCenter = new Center();
        $newCenter->name = $input['name'];
        $newCenter->uuid = Str::uuid()->toString();
        $newCenter->category = $input['category'];
        $newCenter->description = $input['description'];
        $newCenter->location = $input['location'];
        $newCenter->total_size = $input['total_size'];
        $newCenter->total_count = $input['total_count'];
        $newCenter->incharge_name = $input['incharge_name'];
        $newCenter->status = 'active';
        $newCenter->notes = $input['notes'];
        //dd($newCenter);
        $newCenter->save();

        return view('centers.index');

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

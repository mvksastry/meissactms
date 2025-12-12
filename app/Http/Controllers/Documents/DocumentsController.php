<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//Import created models
use App\Models\Documents\Category;

class DocumentsController extends Controller
{
    use HasRoles;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if( Auth::user()->hasAnyRole('ctms_incharge') )
		{
            return view('docs.docsHome');
        }

        if( Auth::user()->hasAnyRole('researcher') )
		{
            return view('docs.docsHome');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if( Auth::user()->hasAnyRole('ctms_incharge') )
		{
            $categories = Category::where('status', 'active')->get();
            return view('docs.newDocForm', ['categories' => $categories]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd("reached");
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

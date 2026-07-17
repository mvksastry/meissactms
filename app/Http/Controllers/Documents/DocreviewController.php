<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Framework needs
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;


use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

//Uuid import class
use Illuminate\Support\Str;

//Import created models
use App\Models\Documents\DocumentCategory;
use App\Models\Documents\Document;
use App\Models\Documents\DocumentVersion;

//traits
use App\Traits\Fileuploads\DocumentUploads;


class DocreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if( Auth::user()->hasAnyRole(['ctms_incharge', 'director']) )
		{
            $activeDocs = Document::with('category')->with('doc_versions')->get();
            //dd($activeDocs);
            Log::channel('activity')->info('Logged in user [ '.Auth::user()->name.' ] shown Document Review Home Dashboard');
            return view('docs.docsReviewHome')->with('activeDocs', $activeDocs);
        }

        if( Auth::user()->hasAnyRole('researcher') )
		{
            Log::channel('activity')->info('Logged in user [ '.Auth::user()->name.' ] shown Document Review Home Dashboard');
            return view('docs.docsReviewHome');
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

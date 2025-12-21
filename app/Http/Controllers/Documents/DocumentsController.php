<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//Uuid import class
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//Import created models
use App\Models\Documents\Category;
use App\Models\Documents\Document;
use App\Models\Documents\DocumentVersion;

//traits
use App\Traits\Fileuploads\DocumentUploads;

class DocumentsController extends Controller
{
    use HasRoles;
    use DocumentUploads;

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
            return view('docs.docsHome')->with('activeDocs', $activeDocs);
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
        if( Auth::user()->hasAnyRole(['ctms_incharge','director']) )
		{
            $categories = Category::where('status', 'active')->get();
            return view('docs.newDocForm', ['categories' => $categories]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $stop_file_upload = false;
        $filename = null;
        $input = $request->all();
        $fileObj = $project_file = $request->file('sop_file');
        
        if($request->hasFile('sop_file')){
            // true
            $file_error = $request->file('sop_file')->getError();
            $stop_file_upload = true;
        } 

        $request->validate([
            
            'category_id' => 'required|regex:/^[A-Za-z0-9_]+$/',
            //'confidentiality' => 'required|regex:/^[0-9]+$/',
            'open_status' =>     'required|regex:/^[0-9]+$/',
            'department' =>      'required|regex:/^[A-Za-z0-9 ]+$/',
            'title' =>           'required|regex:/^[A-Za-z0-9\-,_:. ]+$/',
            
            'content' =>         'required|       regex:/^[\x20-\x7E]+$/',
            
            'description' =>     'required|regex:/^[A-Za-z0-9\-,_. ]+$/',
            'sop_file' =>        'required|mimes:pdf,xlx,csv, txt|max:2048',
            'created_by' =>      'required|regex:/^[A-Za-z ]+$/',
            'tags' =>            'required|regex:/^[A-Za-z0-9\-;_ ]+$/',
            'notes' =>           'required|regex:/^[A-Za-z0-9\-,_. ]+$/',
            
        ]);
        
        if($stop_file_upload) 
        {
            $result = $this->upload_new_document($fileObj, $input);
            //dd($result);
        }
        
        return redirect()->route('documents.index')->with('success', 'File uploaded successfully!')
                     ->with('file', $result);

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

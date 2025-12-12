<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

//Framework needs
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//Import created models
use App\Models\User;
use App\Models\Documents\Category;


class CategoriesController extends Controller
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
            $categories = Category::where('status', 'active')->get();
            //dd($categories);
            return view('docs.categories.categoryHome', ['categories'=>$categories]);
        }

        if( Auth::user()->hasAnyRole('researcher') )
		{
            return view('docs.categories.categoryHome');
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
            return view('docs.categories.categoryCreateForm');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $input = $request->all();
        //dd($input);
        $newCat = new Category();
        $newCat->name = $input['name'];
        $newCat->uuid = Str::uuid()->toString();
        $newCat->description = $input['description'];
        $newCat->created_by = $input['created_by'];
        $newCat->created_date = date('Y-m-d');
        $newCat->status = 'active';
        $newCat->notes = $input['notes'];
        //dd($newCat);
        $newCat->save();
          return redirect()->route('categories.index')
            ->with('flash_message',
             'New category'. $newCat->name.' added!');

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

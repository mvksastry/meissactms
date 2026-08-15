<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Common\Event;

use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;

// Models
use App\Models\User;

class EventsController extends Controller
{
    //
    use HasRoles;


    public function index()
    {

    }

    public function postCalendarEvent()
    {
        dd("reached events controller");
    }

    public function create()
    {
        //
        dd("reached create");
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $ne = new Event();
        $ne->fill($input);
        //dd($input, $ne);
        $ne->save();

        
        return redirect()->action([HomeController::class, 'index']);
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

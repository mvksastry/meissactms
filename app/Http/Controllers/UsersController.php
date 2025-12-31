<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Route;

// Framework helpers
use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


// Models
use App\Models\User;
use App\Models\ExitedUsers;

//traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TUsers\TUserHandler;

//use SweetAlert2\Laravel\Swal;

class UsersController extends Controller
{
    use HasRoles;
    use Base;
    use FileUploadHandler;
    use TUserHandler;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( Auth::user()->hasAnyRole(['ctms_incharge', 'director']) )
		{
            //$users = User::all();
            $users = $this->getAllRolesForUsers();
            //dd($users);
            $roles = Role::all();
            $exited = ExitedUsers::all();
            //dd($users, $roles);
            return view('urp.users.users-home')->with([
                'users' => $users,
                'roles' => $roles,
                'exited' => $exited
            ]);
        }
        else {
          return view('layouts.errors.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exclude = ['sys_admin','ctms_admin','ctms_incharge', 'director'];
        $roles = Role::whereNotIn('name', $exclude)->get();
        return view('urp.users.create-form')->with('roles', $roles);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if( Auth::user()->hasAnyRole('ctms_incharge|director') )
        {
      		$newUser = $request->all();
            //dd($newUser);
            Validator::make($newUser, [
                'name' => ['required', 'string', 'max:55'],
                'email' => ['required', 'string', 'email', 'max:55', 'unique:users'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'after:start_date'],
                'role' => ['required', 'string', 'max:30'],
            ])->validate();

            $ak = $this->setNewUser($newUser);
            foreach($ak as $key => $value)
            {
                $request->session()->flash($key, $value);
            }
            return redirect()->route('ctms-users.index');
        }
        else {
          return view('layouts.errors.404');
        }
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
        //dd($id);
        $edit_user = User::where('uuid', $id)->first();
        //dd($edit_user);
        return view('urp.users.edit-user-form')->with(['edit_user'=>$edit_user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'password' => 'nullable|string|min:8|max:20',
            'end_date' => 'required|date'
        ]);

        $data = [
            'password' => $request->password,
            'expiry_date' => $request->end_date,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }
        else {
            unset($data['password']);
        }

        $user = User::where('uuid', $id)->first();

        $result = $user->update($data);
        
        if($result > 0)
        {
            $request->session()->flash('success', 'User Update Successful');
        }
        else{
            $request->session()->flash('error', 'User update Failed.');
        }

        return redirect()->route('ctms-users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('uuid', $id)->first();
        $result = $this->setUserInactivation($user);
        //dd($result);
        //now delete the current user from user's table
        $user->delete();
        session()->flash('success', 'User Inactivation Successful');
        return redirect()->route('ctms-users.index');
    }
}

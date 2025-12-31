<?php

namespace App\Traits\TUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\ExitedUsers;

//use File;
use App\Traits\Base;

use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;

trait TUserHandler
{
  use Base;

  public function setNewUser($input)
  {
      $input['folder'] = $this->generateCode(15); //added by ks
      $input['password'] = "secret1234"; //should be loggable

      try {
      
      $result = User::create([
          'uuid'        => Str::uuid()->toString(),
          'name'        => $input['name'],
          'email'       => $input['email'],
          'password'    => Hash::make($input['password']),
          'folder'      => $input['folder'],
          'role'        => $input['role'],
          'start_date'  => $input['start_date'],
          'expiry_date' => $input['end_date'],
      ]);
      
      if ($result) { 
            $key = 'success';
            $msg = 'New user ['.$input['name'].'] created successfully!';
            Log::channel('users')->info($msg);
            $ak = [$key => $msg];
            return $ak;
        } else {
            $key = 'error';
            $msg = 'New user ['.$input['name'].'] could not be created';
            Log::channel('users')->info($msg);
            $ak = [$key => $msg];
            return $ak;
        }
        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $key = 'error';
            $msg = 'Database error for new user ['.$input['name'].'] while saving : '.$e->getMessage();
            $ak = [$key => $msg];
            return $ak;
        } catch (\Exception $e) {
          // Handles any other general exceptions
            $key = 'error';
            $msg = 'Unexpected error for new patient ['.$input['name'].'] while saving : '.$e->getMessage();
            Log::channel('patient')->info($msg);
            $ak = [$key => $msg];
            return $ak;      
        }
                // Flash a success message
  }

  public function setUserInactivation($user)
  {
        $inactUser = new ExitedUsers();

        $inactUser->exited_user_id = $user->id;
        $inactUser->name = $user->name;
        $inactUser->uuid = $user->uuid;
        $inactUser->email = $user->email ;
        $inactUser->email_verified_at = $user->email_verified_at;

        $inactUser->team_id = $user->team_id;
        $inactUser->profile_photo_path = $user->profile_photo_path;
        $inactUser->folder = $user->folder;
        $inactUser->start_date = $user->start_date;
        $inactUser->date_exited = date('Y-m-d');
        $inactUser->first_login = $user->first_login;

        $inactUser->exit_authorized_by = Auth::user()->name;
        $inactUser->date_authorized = date('Y-m-d');

        $inactUser->reactivation_requested_by = null;
        $inactUser->reactivation_request_date = null;
        
        $inactUser->reactivation_approved_by = null;
        $inactUser->reactivation_approved_date = null;


        $inactUser->created_at = date('Y-m-d H:i:s');
        $inactUser->updated_at = date('Y-m-d H:i:s');
        //dd($inactUser);
        $inactUser->save();

  }

}
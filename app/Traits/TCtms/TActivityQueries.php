<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Storage;

use App\Models\Ctms\ActivityAssent;
use App\Models\Ctms\CtmsActivities;

//use File;
use App\Traits\Base;

trait TActivityQueries
{
	use Base;
	
	public function allCtmsActivities()
	{
		return CtmsActivities::all();
	}
	
	public function ctmsActivityById($id)
	{
		return CtmsActivities::where('ctms_activity_id', $id)->first();
	}
	
	public function allCtmsActivityUsers()
	{
		return ActivityAssent::with('allowed')->with('ctms_activity')->get();	
	}

	public function ctmsActivityAllowed()
	{
		return ActivityAssent::with('CtmsActivities')
							->where('allowed_id', Auth::id())
							->where('end_date', '>=', date('Y-m-d'))
							->where('status', 'active')
							->get();
		
	}
		
	public function checkCtmsActivityAllowed($id)
	{
		$res = ActivityAssent::where('ctms_activity_id', $id)
						->where('allowed_id', Auth::id())
						->where('end_date', '>=', date('Y-m-d'))
						->where('status', 'active')
						->get();

		if( count($res) >= 1 )
		{
			return true;
		}
		else {
			return false;
		}

	}
		
	public function fetchCtmsActivityPermInfos($project_id, $user_id)
	{
		$res = ActivityAssent::where('resproject_id', $project_id)
							->where('allowed_id', $user_id)
							->where('end_date', '>=', date('Y-m-d'))
							->where('status', 'active')
							->get();

		if( count($res) >= 1 )
		{
			return $res;
		}
		else {
			return null;
		}
	}	

  /*
	public function fetchIeacprojPermInfos($project_id, $user_id)
	{
		$res = Iaecassent::where('iaecproject_id', $project_id)
							->where('allowed_id', $user_id)
							->where('end_date', '>=', date('Y-m-d'))
							->where('status', 1)
							->get();

		if( count($res) >= 1 )
		{
			return $res;
		}
		else {
			return null;
		}
	}	
  */
}
<?php

namespace App\Traits\THub;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Storage;

use App\Models\Ctms\ActivityAssent;
use App\Models\Ctms\Activity;
use App\Models\Ctms\Decisions\Enrollment;

use App\Models\Ehub\AuplMediaProduction;
use App\Models\Ehub\ChondcyteProduction;
use App\Models\Ehub\Passage;

//use File;
use App\Traits\Base;

trait TDashPanelInfos
{
	use Base;

	public function allActiveChoncyteBMPBatches()
	{
		return ChondcyteProduction::where('status', 'active')->count();
	}
	
	public function allActiveAuPlBMRMeidaBatches()
	{
		return AuplMediaProduction::where('status', 'active')->count();
	}

  public function distinctActiveCellLines()
  {
    return Passage::where('status', 'active')->distinct('cell_line_id')->count();
  }

}
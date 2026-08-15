<?php

namespace App\Livewire\EHub;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Activity;
use App\Models\Ehub\AuplMediaProduction;
use App\Models\Ehub\ChondcyteProduction;
use App\Models\User;

//traits
use App\Traits\THub\TDashPanelInfos;

//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ProductionHub extends Component
{
    use TDashPanelInfos;
    //dash items
    public $ccyteActiveBatches, $auplMediaActiveBatches, $distinctCellLineCount;

    //----end of dash items
    public $productionActivities;

    public $showFormsForEntry = false;

    public $ctms_activity_id;

    public $id_specific_ctms_activityObj, $users, $table1, $table2; 
    public $team1_id =[], $team2_id = [], $incharge1_id, $incharge2_id;
    public $entry_comment, $createFlag = false;

    //fortesting purpose not for live

    public function dashItems()
    {
        $this->ccyteActiveBatches = $this->allActiveChoncyteBMPBatches();
        $this->auplMediaActiveBatches = $this->allActiveAuPlBMRMeidaBatches();
        $this->distinctCellLineCount = $this->distinctActiveCellLines();
    }


    public function render()
    {
        $this->dashItems();
        //This query below is for code development 
        //dd($this->productionActivities);
        //This query can show that only patients for whom mbr is created.
        //this means activity is for manufacturing, enrollment is done and a MBR id 
        //is created. Now that MBR id is created. 
        //so first get the info from activity.
        //next is to use that enrollment id retrieve the mbr id.
        
        $this->productionActivities = Activity::with('enrolled')
                                              //  ->where('enrollment_id', '<>', null) 
                                                ->where('code', 'mfg')
                                                ->where('mbr_id', null)
                                                ->where('chondcyte_production_id', null)
                                                ->where('auplmed_production_id', null)
                                                ->where('status','active')
                                                ->get();
        

        return view('livewire.e-hub.production-hub');
    }

    public function fnCreateAssociatedBMR($ctms_activity_id)
    {
       // dd($ctms_activity_id);
        $this->ctms_activity_id = $ctms_activity_id;

        //retrieve full object with users and enrollments
        $this->id_specific_ctms_activityObj = Activity::with('incharge')
                                            ->with('leader')
                                            ->with('enrolled')
                                            ->where('ctms_activity_id', $ctms_activity_id)
                                            ->first();
        $this->users = User::all();

        //dd($id_specific_ctms_activityObj);
        //retrieve the enrollment table that has link to 
        //dd("reached new BMR creation stage");
        //show a form here for each of the table
        $this->showFormsForEntry = true;
    }

    public function fnCreateBMRecords()
    {
        if($this->table1 && $this->table2)
        {
            LivewireAlert::title('reached the entry stage')->info()->show();
            $newAuPl_id = $this->fnPostNewEntryAuplMediaProduction();
            $ccp_id = $this->fnPostNewEntryChondcyteProduction();
                       
            //this is for testing as the mbr_id is fixed dummy. Ideally it comes from
            //post entrollment entry of administrative entries like unique id etc..
            //in future, we need to create and add mbr_id, sample id to ctms activity
            //through edit mode.

            //$this->id_specific_ctms_activityObj->mbr_id = $this->mbr_id; 
            //update this line after enrollment done through admin
            if( !empty($newAuPl_id) && !empty($ccp_id) )
            {
                $this->id_specific_ctms_activityObj->chondcyte_production_id = $newAuPl_id;
                $this->id_specific_ctms_activityObj->auplmed_production_id = $ccp_id;
                //activate mfr process. we can use this to query easily.
                $this->id_specific_ctms_activityObj->mfr_status ="active";
                $this->id_specific_ctms_activityObj->mfr_decision_date = date('Y-m-d');
                $this->id_specific_ctms_activityObj->mfr_auth_by = Auth::user()->name;
                //dd($this->id_specific_ctms_activityObj);
                $this->id_specific_ctms_activityObj->save();
                LivewireAlert::title('Production Entries Succeeded')->success()->show();
                $this->showFormsForEntry = false;
            } else {
                LivewireAlert::title('Production Entries Failed - Check with Admin')->warning()->show();
            }

        }else {
            LivewireAlert::title('Check Both Production Needs')->warning()->show();
        }
    }

    public function fnPostNewEntryAuplMediaProduction()
    {
        //first creat or make an entry in the 
        // auplmedia_productions table with all mandatory fields
        $auplmp = new AuplMediaProduction();
        $auplmp->ctms_activity_id = $this->ctms_activity_id;
        $auplmp->assigned_by = Auth::user()->id;
        $auplmp->assigned_date = date('Y-m-d');
        $auplmp->team_ids = json_encode($this->team1_id);
        $auplmp->completed_stages = '[]';
        $auplmp->current_stage = 1;
        $auplmp->comments = $this->entry_comment;
        $auplmp->date_completed = null;
        $auplmp->status = 'active';
        $auplmp->status_date = date('Y-m-d');
        $auplmp->incharge_id = $this->incharge1_id;
        //dd($auplmp);
        $auplmp->save();
        LivewireAlert::title('AuPL Meida Production Initiated')->info()->asToast()->show();
        return $auplmp->auplmed_production_id;

    }

    public function fnPostNewEntryChondcyteProduction()
    {
        //second step is to create an entry in the 
        // chondcyte_productions table all mandatory fields
        $ccp = new ChondcyteProduction();
        $ccp->ctms_activity_id = $this->ctms_activity_id;
        $ccp->assigned_by = Auth::user()->id;
        $ccp->assigned_date = date('Y-m-d');
        $ccp->team_ids = json_encode($this->team2_id);
        $ccp->completed_stages = '[]';
        $ccp->current_stage = 1;
        $ccp->comments = $this->entry_comment;
        $ccp->date_completed = null;
        $ccp->status = 'active';
        $ccp->status_date = date('Y-m-d');
        $ccp->incharge_id = $this->incharge2_id;
        //dd($ccp);
        $ccp->save();
        LivewireAlert::title('Chond Cyte Production Initiated')->info()->asToast()->show();
        return $ccp->chondcyte_production_id;
    }
}

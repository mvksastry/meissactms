<?php

namespace App\Livewire\Qms\NC;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Qms\Capas;
use App\Models\Qms\NCAuditTrail;
//use App\Models\Qms\NCComms;
use App\Models\Qms\NCReview;
use App\Models\Qms\NCStatusHistory;
use App\Models\Qms\NonConformity;
//traits
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
//use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;
//
use Illuminate\Support\Facades\Log;

class NcReviews extends Component
{
    public $nc_id, $entry, $nc_acks, $auto_entry = false, $caparequired;

    public $nc_review, $ncRevs =[];

    public function mount($nc_id)
    {
        $this->nc_id = $nc_id;
        $this->setRevComponent();
       
    }

    public function setRevComponent()
    {
        $this->nc_review = NCReview::where('nc_id', $this->nc_id)->get();
    }

    public function render()
    {
        $this->ncRevs['reviewed_by'] = Auth::user()->name;
        return view('livewire.qms.n-c.nc-reviews');
    }

    public function fnPostNCReview()
    {
        $input = $this->ncRevs;
        //dd($input);
        $nRevEnt = new NCReview();

        $nRevEnt->nc_id = $this->nc_id;
        $nRevEnt->review_stage = $input['review_stage'];
        $nRevEnt->summary = $input['summary'];
        $nRevEnt->capa_required = $input['capa_required'];
        $nRevEnt->reviewed_by = $input['reviewed_by'];
        $nRevEnt->reviewed_at = date('Y-m-d');
        //dd($nRevEnt);
        //if CAPA required yes, then create all data for CAPA

        if($input['capa_required'] == "yes")
        {
            $issueDesc = NonConformity::where('nc_id', $this->nc_id)->value('description');

            $autoCaPa = new Capas();

            $autoCaPa->capa_uuid  = Str::uuid()->toString();
            $autoCaPa->capa_type  = null;
            $autoCaPa->reference_no  = null; // if non NC mediated this will have value
            $autoCaPa->nc_id  = $this->nc_id;
            $autoCaPa->issue_description  = $issueDesc;
            $autoCaPa->root_cause  = null;
            $autoCaPa->action_plan  = null;
            $autoCaPa->reported_by  = Auth::user()->name;
            $autoCaPa->responsible_user_id  = null;
            $autoCaPa->target_date  = date('Y-m-d', strtotime('+7 days'));
            $autoCaPa->closure_date  = date('Y-m-d', strtotime('+15 days'));
            $autoCaPa->capa_status  = 'open';
            dd($autoCaPa);
            $autoCaPa->save();
        }


        $nNcSH = new NCStatusHistory();
        $nNcSH->nc_id = $nNc->nc_id;
        $nNcSH->from_status = "new";
        $nNcSH->to_status = $nNc->current_status;
        $nNcSH->changed_by = $nNc->raised_by;
        $nNcSH->change_reason = "Fresh Entry";
        $nNcSH->save();

        $nNcAT = new NCAuditTrail();
        $nNcAT->record_type = "Insert";
        $nNcAT->nc_id = $this->nc_id;
        $nNcAT->action = $input['review_stage']."For NC ID".$this->nc_id;
        $nNcAT->old_value = null;
        $nNcAT->new_value = json_encode($nRevEnt->toArray());
        $nNcAT->save();
        
        // first entry in CAPA table for further work.
        $nRevEnt->save();
        
        //remove form entries
        $this->ncRevs = [];
        $this->setRevComponent();

    }


}

<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\ModqScore;

use Illuminate\Support\Facades\Log;

trait TPatientModqScore
{

    public function saveMODQScore($input)
    {
      //dd("reached trait");
      //$nModqScore = new ModqScore();
      $nModqScore = ModqScore::where('patient_uuid', $this->patient_uuid)->where('status', 'draft')->first();
      //$nModqScore->patient_uuid = $this->patient_uuid; 
      //dd($nModqScore);
      //$nModqScore->opd_id =  $input['opd_id'];
      //$nModqScore->in_patient_id =  $input['in_patient_id'];
      //$nModqScore->admission_date =  $input['admission_date'];

      $nModqScore->pain_intensity = intval($this->pain_intensity);
      $nModqScore->personal_care = intval($this->personal_care);
      $nModqScore->lifting = intval($this->lifting);
      $nModqScore->walking = intval($this->walking);
      $nModqScore->sitting = intval($this->sitting);
      $nModqScore->standing = intval($this->standing);
      $nModqScore->sleeping = intval($this->sleeping);
      $nModqScore->social_life = intval($this->social_life);
      $nModqScore->travelling = intval($this->travelling);
      $nModqScore->employment_home_making = intval($this->emp_home);
      $nModqScore->total = $this->total;
      $nModqScore->modq_score = $this->mod_score;

      //$nModqScore->status = "draft";
      //$nModqScore->status_date = date('Y-m-d');

      $nModqScore->comment_entered_by = $input['comment_entered_by'];
      $nModqScore->entered_by = $input['entered_by'];
      $nModqScore->entry_date = $input['entry_date'];
      //$nModqScore->verified_by = $input['verified_by'];
      //$nModqScore->verified_date = $input['verified_date'];
      //$nModqScore->sealed_by = $input['entry_sealed_by'];
      //$nModqScore->sealed_date = $input['entry_sealed_date'];

      //dd($nModqScore);
      $result = $nModqScore->save();
      //here write code to remove form fields for all traits
      $this->show_entered_values = true;
      $this->modq_entered = ModqScore::where('patient_uuid', $this->patient_uuid)->first();
      $this->resetInputs();
      return $result;
    }

    public function resetInputs()
    {
      $this->pain_intensity = null;
      $this->personal_care  = null;
      $this->lifting  = null;
      $this->walking  = null;
      $this->sitting  = null;
      $this->standing  = null;
      $this->sleeping  = null;
      $this->social_life  = null;
      $this->travelling  = null;
      $this->emp_home  = null;
      $this->total  = null;
      $this->mod_score  = null;
    }

}
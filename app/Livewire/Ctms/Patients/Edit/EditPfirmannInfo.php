<?php

namespace App\Livewire\Ctms\Patients\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Forms\PfirmannForm;

use App\Models\Ctms\PfirmannGrade;

class EditPfirmannInfo extends Component
{
    //Form bindings
    public PfirmannForm $form;

    //uuid of the patient
    public $uuid;
    public $pfirmg_info;

    public function render()
    {
        $this->pfirmg_info = PfirmannGrade::where('patient_uuid', $this->uuid)->where('status', 'draft')->first();
        $this->setMdtreData($this->pfirmg_info);
        return view('livewire.ctms.patients.edit.edit-pfirmann-info');
    }

    public function setMdtreData($pfirmg_info)
    {
        //dd($pfirmg_info);
        $this->form->opd_id = ($pfirmg_info != null) ? $pfirmg_info->opd_id : "";
        $this->form->in_patient_id = ($pfirmg_info != null) ? $pfirmg_info->in_patient_id : "";
        $this->form->admission_date = ($pfirmg_info != null) ? $pfirmg_info->admission_date : null;

        $this->form->modified_pfirman_grade = ($pfirmg_info != null) ? $pfirmg_info->modified_pfirman_grade : "";

        $this->form->comment_entered_by = ($pfirmg_info != null) ? $pfirmg_info->comment_entered_by : "";
        $this->form->entered_by = Auth::user()->name;
        $this->form->entry_date = ($pfirmg_info != null) ? $pfirmg_info->entry_date : null;
        //dd($this->form);
    }

    public function fnEditPfirmannGrade()
    {
        $this->input = $this->form->all();
        //dd($this->input);
        $result = PfirmannGrade::updateOrcreate(
            ['patient_uuid' => $this->uuid], $this->input
        );
        $result->status = 'draft';
        $result->status_date = date('Y-m-d');
        $result->save();
        $result = null;
        
        $this->dispatch('close_pfirman_panel'); 
    }
}

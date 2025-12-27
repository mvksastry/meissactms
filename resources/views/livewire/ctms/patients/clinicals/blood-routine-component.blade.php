<div>
  {{-- Do your work, then step back. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
    </thead>
    <tbody>
      <tr>
        <td>
          @if($message_panel)
            @include('livewire.error-alerts-callouts')
          @endif
        </td>
      </tr>
    </tbody>
  </table>

  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <tbody> 
      <tr>
        <td>
          <label>Opd ID*</label>
          <input wire:model="form_a.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
        </td>
        <td>
          <label>In Patient ID*</label>
          <input wire:model.defer="form_a.in_patient_id" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
        </td>
        <td>
          <label>Admission Date*</label>
          <input wire:model.defer="form_a.admission_date" id="aadhar_id" type="date" value="null" class="form-control" placeholder="Admission Date">
        </td>
      </tr>
      <tr>  
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <tbody> 
      <tr>
        <td>
          <label>RBC</label>
          <input wire:model.defer="form_a.rbc" type="text"  class="form-control" placeholder="RBC">
        </td>
        <td>
          <label>HGB</label>
          <input wire:model.defer="form_a.hgb" type="text"  class="form-control" placeholder="HGB">
        </td>
        <td>
          <label>HCT</label>
          <input wire:model.defer="form_a.hct" type="text"  class="form-control" placeholder="HCT" >
        </td>
        <td>
          <label>MCV</label>
          <input wire:model.defer="form_a.mcv" type="text"  class="form-control" placeholder="MCV" >
        </td>
        <td>
          <label>MCH</label>
          <input wire:model.defer="form_a.mch" type="text"  class="form-control" placeholder="MCH" >
        </td>
        <td>
          <label>MCHC</label>
          <input wire:model.defer="form_a.mchc" type="text"  class="form-control" placeholder="MCHC" >
        </td>
      </tr>
      <tr>
        <td>
          <label>RDW-SD</label>
          <input wire:model.defer="form_a.rdw_sd" type="text"  class="form-control" placeholder="RDW-SD" >
        </td>
        <td>
          <label>RDW-CV</label>
          <input wire:model.defer="form_a.rdw_cs" type="text"  class="form-control" placeholder="RDW-CV" >
        </td>
        <td>
          <label>PLT</label>
          <input wire:model.defer="form_a.plt" type="text"  class="form-control" placeholder="PLT" >
        </td>
        <td>
          <label>PDW</label>
          <input wire:model.defer="form_a.pdw" type="text"  class="form-control" placeholder="PDW" >
        </td>
        <td>
          <label>MPV</label>
          <input wire:model.defer="form_a.mpv" type="text"  class="form-control" placeholder="MPV" >
        </td>
        <td>
          <label>P-LCR</label>
          <input wire:model.defer="form_a.plcr" type="text"  class="form-control" placeholder="P-LCR" >
        </td>
      </tr>
      <tr>
        <td>
          <label>pct</label>
          <input wire:model.defer="form_a.pct" type="text"  class="form-control" placeholder="pct" >
        </td>
        <td>
          <label>WBC</label>
          <input wire:model.defer="form_a.wbc" type="text"  class="form-control" placeholder="WBC" >
        </td>
      </tr>

      <tr>
        <td>
          <label>Neut(Abs)</label>
          <input wire:model.defer="form_a.neutrophils_abs" type="text"  class="form-control" placeholder="Neut(Abs)" >
        </td>
        <td>
          <label>Neut(%)</label>
          <input wire:model.defer="form_a.neutrophils_percent" type="text"  class="form-control" placeholder="Neut(%)" >
        </td>
        <td>
          <label>Lymph(Abs)</label>
          <input wire:model.defer="form_a.lymph_abs" type="text"  class="form-control" placeholder="Lymph(Abs)" >
        </td>
        <td>
          <label>Lymph(%)</label>
          <input wire:model.defer="form_a.lymph_percent" type="text"  class="form-control" placeholder="Lymph(%)" >
        </td>
        <td>
          <label>Mono(Abs)</label>
          <input wire:model.defer="form_a.mono_abs" type="text"  class="form-control" placeholder="Mono(Abs)" >
        </td>
        <td>
          <label>Mono(%)</label>
          <input wire:model.defer="form_a.mono_percent" type="text"  class="form-control" placeholder="Mono(%)" >
        </td>
      </tr>

      <tr>
        <td>
          <label>EO(Abs)</label>
          <input wire:model.defer="form_a.eo_abs" type="text"  class="form-control" placeholder="EO(Abs)" >
        </td>

        <td>
          <label>EO(%)</label>
          <input wire:model.defer="form_a.eo_percent" type="text"  class="form-control" placeholder="EO(%)" >
        </td>
        <td>
          <label>BASO(Abs)</label>
          <input wire:model.defer="form_a.baso_abs" type="text"  class="form-control" placeholder="BASO(Abs)" >
        </td>
        <td>
          <label>BASO(%)</label>
          <input wire:model.defer="form_a.baso_percent" type="text"  class="form-control" placeholder="BASO(%)" >
        </td>
        <td>
          <label>IG(Abs)</label>
          <input wire:model.defer="form_a.ig_abs" type="text"  class="form-control" placeholder="Ig(Abs)" >
        </td>
        <td>
          <label>IG(%)</label>
          <input wire:model.defer="form_a.ig_percent" type="text"  class="form-control" placeholder="Ig(%)" >
        </td>
      </tr>

      <tr>
        <td colspan="6">
          <label>Summary & Comments*</label>
          <input wire:model.defer="form_a.observations" type="text"  class="form-control" placeholder="Report File" >
        </td>
      </tr> 

      <tr>
        <td colspan="6">
          <label>Laboratory Report File*</label>
          <input wire:model.defer="form_a.lab_report_file" type="text"  class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
    <tbody>        
      <tr>
        <td colspan="2">
          <label>Comment</label>
          <input wire:model.defer="form_a.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_a.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_a.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnBloodRoutine()" class="btn btn-success font-normal mt-3 rounded">ADD BLOOD ROUTINE</button>
</div>

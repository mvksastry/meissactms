  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form.entered_by" class="form-control" value="{{ $patientPrimaryInfo->entered_by }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form.entry_date" class="form-control" value="{{ $patientPrimaryInfo->entry_date }}" id="opd_id" wire:model="form.opd_id" type="date">
         </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Verified By*</label>
          <input wire:model="form.verified_by" class="form-control" value="{{ $patientPrimaryInfo->verified_by }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label>Verified Date*</label>
          <input wire:model="form.verified_date" class="form-control" value="{{ $patientPrimaryInfo->verified_date }}" id="opd_id" wire:model="form.opd_id" type="date">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entry Sealed By*</label>
          <input wire:model="form.entry_sealed_by" class="form-control" value="{{ $patientPrimaryInfo->entry_sealed_by }}" id="opd_id" wire:model="form.opd_id" type="text">
       </td>
        <td colspan="2">
          <label>Sealed Date*</label>
          <input wire:model="form.entry_sealed_date" class="form-control" value="{{ $patientPrimaryInfo->entry_sealed_date }}" id="opd_id" wire:model="form.opd_id" type="date">
        </td>
      </tr>
    </tbody>
  </table>
  
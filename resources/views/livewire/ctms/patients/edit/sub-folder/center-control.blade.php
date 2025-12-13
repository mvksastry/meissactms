  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Center Control Information</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Center*</label>
          <input wire:model="form.center_id" class="form-control" value="{{ $patientPrimaryInfo->center_id }}" id="opd_id" wire:model="form.opd_id" type="number">
        </td>
        <td colspan="1">
          <label>Select Arm*</label>
          <input wire:model="form.ctarm_id" class="form-control" value="{{ $patientPrimaryInfo->ctarm_id }}" id="opd_id" wire:model="form.opd_id" type="number">
        </td>
        <td colspan="1">
          <label>Opd ID*</label>
          <input wire:model="form.opd_id" class="form-control" value="{{ $patientPrimaryInfo->opd_id }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          <input wire:model="form.in_patient_id" class="form-control" value="{{ $patientPrimaryInfo->in_patient_id }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          <input wire:model="form.admission_date" class="form-control" value="{{ $patientPrimaryInfo->admission_date }}" id="opd_id" wire:model="form.opd_id" type="date">
        </td>
      </tr>
    </tbody>
  </table>
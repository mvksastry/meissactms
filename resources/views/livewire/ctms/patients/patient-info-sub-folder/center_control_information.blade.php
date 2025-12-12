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
            <select wire:model="form.center_id" class="form-control">
            <option value="-1">Select</option>
            <option value="1" selected>Pune</option>
            </select>
        </td>
        <td colspan="1">
          <label>Select Arm*</label>
          <select wire:model="form.ctarm_id" class="form-control">
            <option value="-1">Select</option>
            <option value="1">SCT</option>
          </select>
        </td>
        <td colspan="1">
          <label>Opd ID*</label>
          <input wire:model="form.opd_id" class="form-control" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          <input wire:model="form.inpatient_id" placeholder="In Patient ID" class="form-control" wire:model.defer="form.in_patient_id" id="in_patient_id">
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          <input wire:model="form.admission_date" class="form-control" id="admission_date" wire:model="form.admission_date" type="date">
        </td>
      </tr>
    </tbody>
  </table>
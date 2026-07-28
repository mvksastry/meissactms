<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="3" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>Opd ID*</label>
        <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
      </td>
      <td>
        <label>In Patient ID*</label>
        <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
      </td>
      <td>
        <label>Admission Date*</label>
        <input wire:model.defer="form.admission_date" id="aadhar_id" type="date" value="null" class="form-control" placeholder="Admission Date">
      </td>
    </tr> 
    <tr>
      <td>
      <button wire:click="fnSaveStage1ControlsData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD CONTROLS</button>
      </td>
    </tr>
    </tbody>
</table>
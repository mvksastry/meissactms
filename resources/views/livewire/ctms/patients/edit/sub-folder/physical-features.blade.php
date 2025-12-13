<table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="4" align="center">Physical Features</th>
        </tr>
      </thead>
      <tbody> 
        <tr>
          <td colspan="1">
            <label>Height*</label>
            <input wire:model="form.height" class="form-control" value="{{ $patientPrimaryInfo->height }}" id="opd_id" wire:model="form.opd_id" type="text">
          </td>
          <td colspan="1">
            <label>Height Unit*</label>
            <input wire:model="form.height_unit" class="form-control" value="{{ $patientPrimaryInfo->height_unit }}" id="opd_id" wire:model="form.opd_id" type="text">
          </td>
        </tr>
        <tr>
          <td colspan="1">
            <label>Weight*</label>
            <input wire:model="form.weight" class="form-control" value="{{ $patientPrimaryInfo->weight }}" id="opd_id" wire:model="form.opd_id" type="text">
          </td>
          <td colspan="1">
            <label>Weight Unit*</label>
            <input wire:model="form.weight_unit" class="form-control" value="{{ $patientPrimaryInfo->weight_unit }}" id="opd_id" wire:model="form.opd_id" type="text">    
          </td>
          <td colspan="1">
            <label>BMI*</label>
            <input wire:model="form.bmi" class="form-control" value="{{ $patientPrimaryInfo->bmi }}" id="opd_id" wire:model="form.opd_id" type="text">
          </td>
        </tr>
      </tbody>
  </table>
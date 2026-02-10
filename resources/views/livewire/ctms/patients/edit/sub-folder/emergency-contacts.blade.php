<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Emergency Contacts</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Emergency Contact Name*</label>
          <input wire:model="form.emergency_contact_name" class="form-control" value="{{ $patientPrimaryInfo->emergency_contact_name }}"  type="text">
         </td>
        <td>
          <label>Emergency Contact Phone*</label>
          <input wire:model="form.emergency_contact_phone" class="form-control" value="{{ $patientPrimaryInfo->emergency_contact_phone }}"  type="text">
        </td>
        <td>
          <label>Alternate Contact Name*</label>
          <input wire:model="form.alternate_contact_name" class="form-control" value="{{ $patientPrimaryInfo->alternate_contact_name }}"  type="text">
        </td>
        <td>
          <label>Alternate Contact Phone*</label>
          <input wire:model="form.alternate_contact_phone" class="form-control" value="{{ $patientPrimaryInfo->alternate_contact_phone }}"  type="text">
        </td>
      </tr>
    </tbody>
  </table>

  <button wire:click="fnSaveEditPrimaryInfo()" class="btn btn-warning font-normal mt-3 rounded">EDIT PRIMARY INFO</button>
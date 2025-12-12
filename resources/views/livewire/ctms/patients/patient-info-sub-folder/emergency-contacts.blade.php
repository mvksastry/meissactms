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
          <input wire:model="form.emergency_contact_name" id="emergency_contact_name" type="text" value="null" class="form-control" placeholder="Emergency Contact Name">
        </td>
        <td>
          <label>Emergency Contact Phone*</label>
          <input wire:model="form.emergency_contact_phone" id="emergency_contact_phone" type="number" value="null" class="form-control" placeholder="Emergency Contact Phone">
        </td>
        <td>
          <label>Alternate Contact Name*</label>
          <input wire:model.defer="form.alternate_contact_name"  id="alternate_contact_name" type="text" value="null" class="form-control" placeholder="Alternate Contact Name">
        </td>
        <td>
          <label>Alternate Contact Phone*</label>
          <input wire:model.defer="form.alternate_contact_phone" id="alternate_contact_phone" type="number" value="null" class="form-control" placeholder="Alternate Contact Phone">
        </td>
      </tr>
    </tbody>
  </table>
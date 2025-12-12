  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Personal Identifications</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Aadhar ID*</label>
          <input wire:model.defer="form.aadhar_id" id="aadhar_id" type="number" value="null" class="form-control" placeholder="Aadhar ID">
        </td>
        <td colspan="1">
          <label>PAN*</label>
          <input wire:model.defer="form.pan_num" id="pan_num" type="text" value="null" class="form-control" placeholder="PAN">
        </td>
        <td colspan="1">
          <label>Other ID*</label>
          <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
        </td>
        <td colspan="1">
          <label>Occupation*</label>
          <input wire:model.defer="form.present_occupation" id="present_occupation" type="text" value="null" class="form-control" placeholder="Occupation" >
        </td>
      </tr>  
      <tr>
        <td colspan="4"> 
          <label>Patient Primary Information*</label>
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Name*</label>
          <input wire:model="form.name" id="name" type="text" value="null" class="form-control" placeholder="Full Name">
        </td>
        <td colspan="1">
          <label>Nick Name*</label>
          <input wire:model="form.nick_name" id="item_desc" type="text" value="null" class="form-control" placeholder="Nick Name">
        </td>
        <td colspan="1">
          <label>Alias Name*</label>
          <input wire:model="form.alias_name" id="description" type="text" value="null" class="form-control" placeholder="Alias Name">
        </td>
        <td colspan="1">
          <label>Gender*</label>
          <input wire:model.defer="form.gender" id="item_desc" type="text" value="null" class="form-control" placeholder="Gender">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Date of Birth*</label>
          <input wire:model="form.date_of_birth" id="date_of_birth" type="date" value="null" class="form-control" placeholder="Date of Birth">
        </td>
        <td colspan="1">
          <label>Age*</label>
          <input wire:model.defer="form.age" id="age" type="number"  class="form-control" placeholder="Age">
        </td>
        <td colspan="1">
          <label>Primary Phone*</label>
          <input wire:model="form.primary_phone_number" id="primary_phone_number" type="number" value="null" class="form-control" placeholder="Primary Phone Number">
        </td>
        <td colspan="1">
          <label>Alternate Phone*</label>
          <input wire:model.defer="form.alternate_phone_number" id="alternate_phone_number" type="number" value="null" class="form-control"  placeholder="Alternate Phone Numer">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Address*</label>
          <input wire:model="form.address" id="address" type="text" value="null" class="form-control" placeholder="Address">
        </td>
        <td colspan="1">
          <label>Land Mark*</label>
          <input wire:model.defer="form.land_mark" id="age" type="text"  class="form-control" placeholder="Age">
        </td>
        <td colspan="1">
          <label>Taluka/Haveli*</label>
          <input wire:model="form.taluka_haveli" id="taluka_haveli" type="text" value="null" class="form-control" placeholder="taluka_haveli">
        </td>
        <td colspan="1">
          <label>State*</label>
          <input wire:model.defer="form.state" id="state" type="text" value="null" class="form-control"  placeholder="State">
        </td>
      </tr>                                  
    </tbody>
  </table>
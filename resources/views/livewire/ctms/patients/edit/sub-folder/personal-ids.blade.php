  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4">Personal Identifications</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="3">
          <label>Unique ID*</label>
          </br>
          {{ $patientPrimaryInfo->patient_uuid }}
        </td>
      </tr>
      <tr>
        <td>
          <label>Aadhar ID</label>
          <input wire:model="form.aadhar_id" class="form-control" value="{{ $patientPrimaryInfo->aadhar_id }}"  type="text">
        </td>
        <td>
          <label>PAN</label>
          <input wire:model="form.pan_num" class="form-control" value="{{ $patientPrimaryInfo->pan_num }}"  type="text">
        </td>
        <td>
          <label>Other ID</label>
          <input wire:model="form.other_id" class="form-control" value="{{ $patientPrimaryInfo->other_id }}"  type="text">
        </td>
        <td colspan="1">
          <label>Occupation*</label>
          <input wire:model="form.present_occupation" class="form-control" value="{{ $patientPrimaryInfo->present_occupation }}"  type="text">
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
          <input wire:model="form.name" class="form-control" value="{{ $patientPrimaryInfo->name }}"  type="text">
        </td>
        <td colspan="1">
          <label>Nick Name*</label>
          <input wire:model="form.nick_name" class="form-control" value="{{ $patientPrimaryInfo->nick_name }}"  type="text">
        </td>
        <td colspan="1">
          <label>Alias Name*</label>
          <input wire:model="form.alias_name" class="form-control" value="{{ $patientPrimaryInfo->alias_name }}"  type="text">
        </td>
        <td colspan="1">
          <label>Gender*</label>
          <input wire:model="form.gender" class="form-control" value="{{ $patientPrimaryInfo->gender }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Date of Birth*</label>
          <input wire:model="form.date_of_birth" class="form-control" value="{{ $patientPrimaryInfo->date_of_birth }}"  type="text">
        </td>
        <td colspan="1">
          <label>Age*</label>
          <input wire:model="form.age" class="form-control" value="{{ $patientPrimaryInfo->age }}"  type="text">
       </td>
        <td colspan="1">
          <label>Primary Phone*</label>
          <input wire:model="form.primary_phone_number" class="form-control" value="{{ $patientPrimaryInfo->primary_phone_number }}"  type="text">
        </td>
        <td colspan="1">
          <label>Alternate Phone*</label>
          <input wire:model="form.alternate_phone_number" class="form-control" value="{{ $patientPrimaryInfo->alternate_phone_number }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Address*</label>
          <input wire:model="form.address" class="form-control" value="{{ $patientPrimaryInfo->address }}"  type="text">
        </td>
        <td colspan="1">
          <label>Land Mark*</label>
          <input wire:model="form.land_mark" class="form-control" value="{{ $patientPrimaryInfo->land_mark }}"  type="text">
        </td>
        <td colspan="1">
          <label>Taluka/Haveli*</label>
          <input wire:model="form.taluka_haveli" class="form-control" value="{{ $patientPrimaryInfo->taluka_haveli }}"  type="text">
        </td>
        <td colspan="1">
          <label>State*</label>
          <input wire:model="form.state" class="form-control" value="{{ $patientPrimaryInfo->state }}"  type="text">
        </td>
      </tr>                                  
    </tbody>
  </table>
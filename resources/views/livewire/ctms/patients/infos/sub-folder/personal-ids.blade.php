  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Personal Identifications</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="1">
          <label>Aadhar ID</label>
          </br>
          {{ $patientPrimaryInfo->aadhar_id }}
        </td>
        <td colspan="1">
          <label>PAN</label>
          </br>
          {{ $patientPrimaryInfo->pan_num }}
        </td>
        <td colspan="1">
          <label>Other ID</label>
          </br>
          {{ $patientPrimaryInfo->other_id }}
        </td>
        <td colspan="1">
          <label>Occupation</label>
          </br>
          {{ $patientPrimaryInfo->aadhar_id }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Patient Primary Information</label>
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Name</label>
          </br>
          <label class="text-danger">{{ $patientPrimaryInfo->name }}</label>
        </td>
        <td colspan="1">
          <label>Nick Name</label>
          </br>
          {{ $patientPrimaryInfo->nic_name }}
        </td>
        <td colspan="1">
          <label>Alias Name</label>
          </br>
          {{ $patientPrimaryInfo->alias_name }}
        </td>
        <td colspan="1">
          <label>Gender</label>
          </br>
          <label class="text-danger">{{ $patientPrimaryInfo->gender }}
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Date of Birth</label>
          </br>
          <label class="text-danger">{{ $patientPrimaryInfo->date_of_birth }}</label>
        </td>
        <td colspan="1">
          <label>Age</label>
          </br>
          <label class="text-danger">{{ $patientPrimaryInfo->age }}</label>
        </td>
        <td colspan="1">
          <label>Primary Phone</label>
          </br>
          <label class="text-danger">{{ $patientPrimaryInfo->primary_phone_number }}</label>
        </td>
        <td colspan="1">
          <label>Alternate Phone</label>
          </br>
          {{ $patientPrimaryInfo->alternate_phone_number }}
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Address</label>
          </br>
          {{ $patientPrimaryInfo->address }}
        </td>
        <td colspan="1">
          <label>Land Mark</label>
          </br>
          {{ $patientPrimaryInfo->land_mark }}
        </td>
        <td colspan="1">
          <label>Taluka/Haveli</label>
          </br>
          {{ $patientPrimaryInfo->taluka_haveli }}
        </td>
        <td colspan="1">
          <label>State</label>
          </br>
          {{ $patientPrimaryInfo->state }}
        </td>
      </tr>
    </tbody>
  </table>

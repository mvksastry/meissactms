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
          </br>{{ $patientPrimaryInfo->emergency_contact_name }}
         </td>
        <td>
          <label>Emergency Contact Phone*</label>
          </br>{{ $patientPrimaryInfo->emergency_contact_phone }}
        </td>
        <td>
          <label>Alternate Contact Name*</label>
          </br>{{ $patientPrimaryInfo->alternate_contact_name }}
        </td>
        <td>
          <label>Alternate Contact Phone*</label>
          </br>{{ $patientPrimaryInfo->alternate_contact_phone }}
        </td>
      </tr>
    </tbody>
  </table>
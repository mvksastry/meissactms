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
        </br>
            {{ $patientPrimaryInfo->center_id }}
        </td>
        <td colspan="1">
          <label>Select Arm*</label>
          </br>
          {{ $patientPrimaryInfo->ctarm_id }}
        </td>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>
          {{ $patientPrimaryInfo->opd_id }}
          
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>
          {{ $patientPrimaryInfo->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>
          {{ $patientPrimaryInfo->admission_date }}
        </td>
      </tr>
    </tbody>
  </table>
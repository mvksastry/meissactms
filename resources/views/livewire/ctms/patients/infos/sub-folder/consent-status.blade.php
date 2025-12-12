    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="4" align="center">Consent Status</th>
        </tr>
      </thead>
      <tbody>        
        <tr>
          <td colspan="2">
            <label>Consent Status*</label>
            </br>{{ $patientPrimaryInfo->consent_status }}
          </td>
          <td colspan="2">
            <label>Consent Date*</label>
            </br>{{ $patientPrimaryInfo->consent_date }}
         </td>
          <td colspan="2">
            <label>Consent Audio/Video*</label>
            </br>{{ $patientPrimaryInfo->consent_av }}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <label>Consent Approval Date*</label>
            </br>{{ $patientPrimaryInfo->consent_approval_date }}
          </td>
          <td colspan="2">
            <label>Consent Approval Reference*</label>
            </br>{{ $patientPrimaryInfo->consent_approval_reference }}
          </td>
          <td colspan="2">
            <label>Consent Approval File*</label>
            </br>{{ $patientPrimaryInfo->consent_approval_file }}
          </td>
        </tr>
      </tbody>
  </table>
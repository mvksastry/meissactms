    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th align="center">Consent Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <label>Consent Status</label>
            </br>{{ $patientPrimaryInfo->consent_status }}
          </td>
          <td>
            <label>Consent Date</label>
            </br>{{ $patientPrimaryInfo->consent_date }}
          </td>
        </tr>
      </tbody>
    </table>

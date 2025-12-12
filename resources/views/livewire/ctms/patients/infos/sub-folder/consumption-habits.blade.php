  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="1">
          <label>Consumption Non Tobacco Gutka Pan*</label>
          </br>{{ $patientPrimaryInfo->consumption_non_tgp }}
        </td>
        <td colspan="1">
          <label>Tobacco*</label>
          </br>{{ $patientPrimaryInfo->consumption_tobacco }}
        </td>
        <td colspan="1">
          <label>Gutka*</label>
          </br>{{ $patientPrimaryInfo->consumption_gutka }}
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Pan / Masala*</label>
          </br>{{ $patientPrimaryInfo->consumption_pan }}
        </td>
        <td colspan="2">
          <label>Any Other*</label>
          </br>{{ $patientPrimaryInfo->anyother_habbits }}
        </td>
      </tr>
    </tbody>
  </table>
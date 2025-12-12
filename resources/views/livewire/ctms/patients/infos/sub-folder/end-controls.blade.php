  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          </br>{{ $patientPrimaryInfo->entered_by }}
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          </br>{{ $patientPrimaryInfo->entry_date }}
         </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Verified By*</label>
          </br>{{ $patientPrimaryInfo->verified_by }}
        </td>
        <td colspan="1">
          <label>Verified Date*</label>
          </br>{{ $patientPrimaryInfo->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entry Sealed By*</label>
          </br>{{ $patientPrimaryInfo->entry_sealed_by }}
       </td>
        <td colspan="2">
          <label>Sealed Date*</label>
          </br>{{ $patientPrimaryInfo->entry_sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
  
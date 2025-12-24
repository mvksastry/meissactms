  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">Blood Sugar</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci10Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci10Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci10Obj->admission_date }}
        </d>
      </tr> 

      <tr>
        <td>
          <label>ESR</label>
        </br>{{ $ci10Obj->esr }}
        </td>
        <td colspan="2">
          <label>ESR Report File</label>
          </br>{{ $ci10Obj->esr_report_file }}
        </td>
      </tr>

      <tr>
        <td>
          <label>PT Patient</label>
          </br>{{ $ci10Obj->pt_patient }}
        </td>
        <td>
          <label>PT Control</label>
          </br>{{ $ci10Obj->pt_control }}
        </td>
        <td>
          <label>PT Report File</label>
          </br>{{ $ci10Obj->pt_report_file }}
        </td>
      </tr>
      <tr>

      <tr>
        <td>
          <label>INR</label>
        </br>{{ $ci10Obj->inr }}
        </td>
        <td>
          <label>ISI</label>
          </br>{{ $ci10Obj->isi }}
        </td>
      </tr>

      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci10Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci10Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci10Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci10Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci10Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci10Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci10Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci10Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci10Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
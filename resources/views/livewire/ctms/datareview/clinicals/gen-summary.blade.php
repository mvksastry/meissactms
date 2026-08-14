  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">General Summary</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci8Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci8Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci8Obj->admission_date }}
        </d>
      </tr> 

      <tr>
        <td colspan="3">
          <label>General Summary</label>
        </br>{{ $ci8Obj->general_summary }}
        </td>
      </tr>

      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci8Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci8Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci8Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci8Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci8Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci8Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci8Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci8Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci8Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
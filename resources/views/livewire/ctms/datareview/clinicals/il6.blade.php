  <table id="userIndex2" style="background-color: #d1dce1;" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">IL-6 Test</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci9Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci9Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci9Obj->admission_date }}
        </d>
      </tr>
      <tr>     
      <tr>
        <td>
          <label>IL-6</label>
          </br>{{ $ci9Obj->il6 }}
        </td>
      </tr>                               
      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci9Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci9Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci9Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci9Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci9Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci9Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci9Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci9Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci9Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
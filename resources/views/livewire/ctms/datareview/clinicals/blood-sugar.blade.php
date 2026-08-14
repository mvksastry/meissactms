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
          </br>{{ $ci2Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci2Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci2Obj->admission_date }}
        </d>
      </tr> 
      <tr>
        <td>
          <label>Fasting</label>
        </br>{{ $ci2Obj->fasting }}
        </td>
        <td>
          <label>Random</label>
          </br>{{ $ci2Obj->random }}
        </td>
        <td>
          <label>Post-Prandial</label>
          </br>{{ $ci2Obj->post_prandial }}
        </td>
      </tr>    
      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci2Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci2Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci2Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci2Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci2Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci2Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci2Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci2Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci2Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
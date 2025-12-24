  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">Chemical Examination</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci4Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci4Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci4Obj->admission_date }}
        </d>
      </tr> 

      <tr>
        <td>
          <label>Proteins</label>
        </br>{{ $ci4Obj->proteins }}
        </td>
        <td>
          <label>Sugar</label>
        </br>{{ $ci4Obj->sugar }}
        </td>
        <td>
          <label>Ketones</label>
        </br>{{ $ci4Obj->ketones }}
        </td>
      </tr>

      <tr>
        <td>
          <label>Procalcitonin</label>
        </br>{{ $ci4Obj->procalcitonin }}
        </td>
        <td>
          <label>Bile Salts</label>
        </br>{{ $ci4Obj->bile_salts }}
        </td>
        <td>
          <label>Bile Pigments</label>
        </br>{{ $ci4Obj->bile_pigments }}
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <label>CE Report File</label>
          </br>{{ $ci4Obj->ce_report_file }}
        </td>
      </tr>

      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci4Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci4Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci4Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci4Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci4Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci4Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci4Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci4Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci4Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
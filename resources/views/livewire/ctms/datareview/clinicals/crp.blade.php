  {{-- Because she competes with no one, no one can compete with her. --}}
  <table id="userIndex2" style="background-color: #b3e7fd;" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">CRP Test</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci6Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci6Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci6Obj->admission_date }}
        </d>
      </tr>      
      <tr>
        <td>
          <label>CRP</label>
          </br>{{ $ci6Obj->crp }}
        </td>
      </tr>                              

      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci6Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci6Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci6Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci6Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci6Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci6Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci6Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci6Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci6Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
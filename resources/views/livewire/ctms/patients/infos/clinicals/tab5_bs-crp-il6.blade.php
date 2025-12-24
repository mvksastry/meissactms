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
        <td colspan="6">
          <label>Blood Sugar Report File*</label>
          </br>{{ $ci2Obj->bs_report_file }}
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


<!------------------------------- CRP TEST ---------------------------->

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
        <td colspan="5">
          <label>CRP Report File</label>
          </br>{{ $ci6Obj->crp_report_file }}
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


<!------------------------------- IL-6 TEST ---------------------------->

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
        <td colspan="5">
          <label>IL-6 Report File*</label>
          </br>{{ $ci9Obj->il6_report_file }}
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
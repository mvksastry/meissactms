 {{-- Be like water. --}}
  <!--Divider-->
  <table id="userIndex2" style="background-color: #FFECA1;" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3">ELECTROLYTES</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Opd ID*</label>
          </br>{{ $ci7Obj->opd_id }}
        </td>
        <td>
          <label>In Patient ID*</label>
          </br>{{ $ci7Obj->in_patient_id }}
        </td>
        <td>
          <label>Admission Date*</label>
          </br>{{ $ci7Obj->admission_date }}
        </d>
      </tr>
      <tr>  
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <tbody>
      <tr>
        <td>
          <label>Sodium</label>
          </br>{{ $ci7Obj->sodium }}
        </td>
        <td>
          <label>Potassium</label>
          </br>{{ $ci7Obj->potassium }}
        </td>
        <td>
          <label>Chloride</label>
          </br>{{ $ci7Obj->chloride }}
        </td>
      </tr>                                   
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <tbody>
      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci7Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci7Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci7Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci7Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci7Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci7Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci7Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci7Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci7Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
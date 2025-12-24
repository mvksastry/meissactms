  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">Microscopic Examination</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci12Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci12Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci12Obj->admission_date }}
        </d>
      </tr> 

      <tr>
        <td>
          <label>Pus Cells</label>
        </br>{{ $ci12Obj->pus_cells }}
        </td>
        <td>
          <label>Epithelial Cells</label>
        </br>{{ $ci12Obj->epithelial_cells }}
        </td>
        <td>
          <label>RBC</label>
        </br>{{ $ci12Obj->rbcs }}
        </td>
      </tr>

      <tr>
        <td>
          <label>Yeast Cells</label>
        </br>{{ $ci12Obj->yeast_cells }}
        </td>
        <td>
          <label>Bacteria</label>
        </br>{{ $ci12Obj->bacteria }}
        </td>
        <td>
          
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <label>ME Report File</label>
          </br>{{ $ci12Obj->me_report_file }}
        </td>
      </tr>

      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci12Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci12Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci12Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci12Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci12Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci12Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci12Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci12Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci12Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">Urine Routined</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci14Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci14Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci14Obj->admission_date }}
          </d>
      </tr>

      <tr>
        <td>
          <label>Physical Exam</label>
          </br>{{ $ci14Obj->physical_exam }}
        </td>
        <td>
          <label>Quantity</label>
          </br>{{ $ci14Obj->quantity }}
        </td>
        <td>
          <label>Colour</label>
          </br>{{ $ci14Obj->colour }}
        </td>
      </tr>

      <tr>
        <td>
          <label>Appearance</label>
          </br>{{ $ci14Obj->appearance }}
        </td>
        <td>
          <label>Deposits</label>
          </br>{{ $ci14Obj->deposits }}
        </td>
        <td>
          <label>pH</label>
          </br>{{ $ci14Obj->ph }}
        </td>
      </tr>

      <tr>
        <td>
          <label>Specific Gravity</label>
          </br>{{ $ci14Obj->specific_gravity }}
        </td>
        <td>
        </td>
        <td>

        </td>
      </tr>

      <tr>
        <td colspan="2">
          <label>Comment By Entered</label>
          </br>{{ $ci14Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
          <label>Entered By*</label>
          </br>{{ $ci14Obj->entered_by }}
        </td>
        <td>
          <label>Entry Date*</label>
          </br>{{ $ci14Obj->entry_date }}
        </td>
      </tr>
    </tbody>
  </table>

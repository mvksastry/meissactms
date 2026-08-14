    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Urea (mg/dL)</label>
          </br>
          {{ $ci3Obj->urea }}
        </td>
        <td>
          <label>Blood Urea Nitrogen (mg/dL)</label>
          </br>
          {{ $ci3Obj->blood_urea_nitrogen }}
        </td>
      </tr> 
      <tr>
        <td colspan="2">
          <label>Comment By Entered</label>
          </br>{{ $ci3Obj->comment_entered_by }}
          </td>
      </tr>
      <tr>
        <td>
        <label>Entered B</label>
        </br>{{ $ci3Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci3Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci3Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci3Obj->verified_by }}
        </td>
        <td>
        <label>Date Verfieid*</label>
        </br>{{ $ci3Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci3Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci3Obj->sealed_by }}
        </td>
        <td>
        <label>Date Sealed</label>
        </br>{{ $ci3Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
    
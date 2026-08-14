  {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Serum Creatinine (mg/dL)</label>
        </br>
        {{ $ci5Obj->serum_creatinine }}
        </td>
      </tr>        
      <tr>
        <td colspan="3">
        <label>Comment By Entered</label>
        </br>{{ $ci5Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci5Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci5Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="3">
        <label>Comment By Verified</label>
        </br>{{ $ci5Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci5Obj->verified_by }}
        </td>
        <td>
        <label>Date Verified</label>
        </br>{{ $ci5Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="3">
        <label>Comment By Sealed</label>
        </br>{{ $ci5Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By</label>
        </br>{{ $ci5Obj->sealed_by }}
        </td>
        <td>
        <label>Date Sealed</label>
        </br>{{ $ci5Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>


    {{-- Success is as dangerous as failure. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">Liver Functions</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $ci1Obj->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $ci1Obj->in_patient_id }}
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $ci1Obj->admission_date }}
        </d>
      </tr>
      <tr>  
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Liver Function and Electrolytes</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Serum Total protein</label>
          </br>{{ $ci11Obj->serum_total_protein }}
        </td>
        <td>
          <label>Serum Albumin</label>
          </br>{{ $ci11Obj->serum_albumin }}
        </td>
        <td>
          <label>Globulin</label>
          </br>{{ $ci11Obj->globulin }}
        </td>
        <td>
          <label>A/G Ratio</label>
          </br>{{ $ci11Obj->ag_ratio }}
        </td>
      </tr>
      <tr>
        <td>
          <label>Total Bilirubin</label>
          </br>{{ $ci11Obj->total_bilirubin }}
        </td>
        <td>
          <label>Direct Bilirubin</label>
          </br>{{ $ci11Obj->direct_bilirubin }}
        </td>

        <td>
          <label>Indirect Bilirubin</label>
          </br>{{ $ci11Obj->indirect_bilirubin }}
        </td>
      </tr>
      <tr>
        <td>
          <label>S.G.O.T</label>
          </br>{{ $ci11Obj->sgot }}
        </td>
        <td>
          <label>S.G.P.T</label>
          </br>{{ $ci11Obj->sgpt }}
        </td>
        <td>
          <label>Alkaline Phosphatase</label>
          </br>{{ $ci11Obj->alkaline_phosphatase }}
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Observations</label>
          </br>{{ $ci11Obj->observations }}
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Liver Report File*</label>
          </br>{{ $ci11Obj->lft_report_file }}
        </td>
      </tr>
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $ci1Obj->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $ci1Obj->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci1Obj->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $ci1Obj->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $ci1Obj->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci1Obj->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $ci1Obj->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $ci1Obj->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $ci1Obj->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
  
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
      <tr>
        <td colspan="6">
          <label>Electrolyte Report File*</label>
          </br>{{ $ci7Obj->electrolyte_report_file }}
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
    

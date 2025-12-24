   {{-- Do your work, then step back. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center">Blood Routine</th>
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
      </tr>
      <tr>  
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>RBC</label>
          </br>{{ $ci1Obj->rbc }}
        </td>
        <td>
          <label>HGB</label>
          </br>{{ $ci1Obj->hbg }}
        </td>
        <td>
          <label>HCT</label>
          </br>{{ $ci1Obj->hct }}
        </td>
        <td>
          <label>MCV</label>
          </br>{{ $ci1Obj->mcv }}
        </td>
        <td>
          <label>MCH</label>
          </br>{{ $ci1Obj->mch }}
        </td>
        <td>
          <label>MCHC</label>
          </br>{{ $ci1Obj->mchc }}
        </td>
      </tr>
      <tr>
        <td>
          <label>RDW-SD</label>
          </br>{{ $ci1Obj->rdw_sd }}
        </td>
        <td>
          <label>RDW-CV</label>
          </br>{{ $ci1Obj->rdw_cv }}
        </td>
        <td>
          <label>PLT</label>
          </br>{{ $ci1Obj->plt }}
        </td>
        <td>
          <label>PDW</label>
          </br>{{ $ci1Obj->pdw }}
        </td>
        <td>
          <label>MPV</label>
          </br>{{ $ci1Obj->mpv }}
        </td>
        <td>
          <label>P-LCR</label>
          </br>{{ $ci1Obj->plcr }}
        </td>
      </tr>
      <tr>
        <td>
          <label>pct</label>
          </br>{{ $ci1Obj->pct }}
        </td>
        <td>
          <label>WBC</label>
          </br>{{ $ci1Obj->wbc }}
        </td>
      </tr>

      <tr>
        <td>
          <label>Neut(Abs)</label>
          </br>{{ $ci1Obj->neutrophils_abs }}
        </td>
        <td>
          <label>Neut(%)</label>
          </br>{{ $ci1Obj->neutrophils_percent }}
        </td>
        <td>
          <label>Lymph(Abs)</label>
          </br>{{ $ci1Obj->lymph_abs }}
        </td>
        <td>
          <label>Lymph(%)</label>
          </br>{{ $ci1Obj->lymph_percent }}
        </td>
        <td>
          <label>Mono(Abs)</label>
          </br>{{ $ci1Obj->mono_abs }}
        </td>
        <td>
          <label>Mono(%)</label>
          </br>{{ $ci1Obj->mono_percent }}
        </td>
      </tr>

      <tr>
        <td>
          <label>EO(Abs)</label>
          </br>{{ $ci1Obj->eo_abs }}
        </td>

        <td>
          <label>EO(%)</label>
          </br>{{ $ci1Obj->eo_percent }}
        </td>
        <td>
          <label>BASO(Abs)</label>
          </br>{{ $ci1Obj->baso_abs }}
        </td>
        <td>
          <label>BASO(%)</label>
          </br>{{ $ci1Obj->baso_percent }}
        </td>
        <td>
          <label>IG(Abs)</label>
          </br>{{ $ci1Obj->ig_abs }}
        </td>
        <td>
          <label>IG(%)</label>
          </br>{{ $ci1Obj->ig_percent }}
        </td>
      </tr>

      <tr>
        <td colspan="6">
          <label>Summary & Comments*</label>
          </br>{{ $ci1Obj->observations }}
        </td>
      </tr> 

      <tr>
        <td colspan="6">
          <label>Laboratory Report File*</label>
          </br>{{ $ci1Obj->br_report_file }}
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
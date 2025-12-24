<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center"> Paitient ID: {{ $patient_uuid }}</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          </br>{{ $clinical_info->opd_id }}
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          </br>{{ $clinical_info->in_patient_id }}
          
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          </br>{{ $clinical_info->admission_date }}
        </td>
      </tr>
      <tr>
      </tr>  
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
          <label>O E*</label>
          </br>{{ $clinical_info->o_e }}          
        </td>
        <td>
          <label>PR*</label>
          </br>{{ $clinical_info->pr }}          
        </td>
        <td>
          <label>Temperature*</label>
          </br>{{ $clinical_info->temperature }}          
        </td>
        <td>
          <label>BP-Systolic*</label>
          </br>{{ $clinical_info->bp_systolic }}          
        </td>
        <td>
          <label>BP-Diastolic*</label>
          </br>{{ $clinical_info->bp_diastolic }}          
        </td>
      </tr>
      <tr>
        <td>
          <label>CVS*</label>
          </br>{{ $clinical_info->cvs }}          
        </td>

        <td>
          <label>P/A*</label>
          </br>{{ $clinical_info->p_a }}          
        </td>
        <td>
          <label>CNS*</label>
          </br>{{ $clinical_info->cns }}          
        </td>
        <td>
          <label>CBC*</label>
          </br>{{ $clinical_info->cbc }}          
        </td>
      </tr>
      <tr>
        <td>
          <label>ESR*</label>
          </br>{{ $clinical_info->esr }}        
        </td>
        <td>
          <label>CRP*</label>
          </br>{{ $clinical_info->crp }}          
        </td>
        <td>
          <label>RFT*</label>
          </br>{{ $clinical_info->rft }}          
        </td>
        <td>
          <label>LFT*</label>
          </br>{{ $clinical_info->lft }}          
        </td>
      </tr>
      <tr>
        <td>
          <label>Clotting Time*</label>
          </br>{{ $clinical_info->clotting_time }}
       </td>
        <td>
          <label>Bleeding Time*</label>
          </br>{{ $clinical_info->bleeding_time }}
        </td>
        <td>
          <label>Prothrombin time*</label>
          </br>{{ $clinical_info->prothrombin_time }}
        </td>

        <td>
          <label>Procalcitonin*</label>
          </br>{{ $clinical_info->procalcitonin }}
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Laboratory Report File*</label>
          </br>{{ $clinical_info->laboratory_report_file }}
        </td>
      </tr>                                    
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="2" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="2">
        <label>Comment By Entered</label>
        </br>{{ $clinical_info->comment_entered_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        </br>{{ $clinical_info->entered_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $clinical_info->entry_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Verified</label>
        </br>{{ $clinical_info->comment_verified_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Verified By*</label>
        </br>{{ $clinical_info->verified_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $clinical_info->verified_date }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <label>Comment By Sealed</label>
        </br>{{ $clinical_info->comment_sealed_by }}
        </td>
      </tr>
      <tr>
        <td>
        <label>Sealed By*</label>
        </br>{{ $clinical_info->sealed_by }}
        </td>
        <td>
        <label>Entry Date*</label>
        </br>{{ $clinical_info->sealed_date }}
        </td>
      </tr>
    </tbody>
  </table>
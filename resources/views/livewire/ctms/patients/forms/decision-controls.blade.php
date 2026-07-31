  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          OPD ID: {{ $enrObj->opd_id }} ; IPD ID: {{ $enrObj->discectomy_ipd_id }}; Admission Date: {{ $enrObj->discectomy_admission_date  }}
        </td>
      </tr>

      <tr>
        <td>
          Discectomy Date: {{ $enrObj->discectomy_date }}; Surgenos: {{ $enrObj->surgeons_names  }}; Other: {{ $enrObj->discectomy_other_info  }}
          Comment: {{ $enrObj->discectomy_comments }}; Entered By: {{ $enrObj->discectomy_comments }}; Date: {{ $enrObj->disc_info_date_entered  }}
        </td>
      </tr>

      <tr>
        <td>
          Discectomy Date: {{ $enrObj->discectomy_sample_desc }}; Surgenos: {{ $enrObj->discectomy_sample_number  }}; Other: {{ $enrObj->discectomy_sample_comments  }}
          Comment: {{ $enrObj->discectomy_sample_comments }}; 
          Entered By: {{ $enrObj->discectomy_sample_info_entered_by }}; Date: {{ $enrObj->discectomy_sample_info_date_entered  }}
        </td>
      </tr>

      <tr>
        <td>
          QC Report 1: {{ $enrObj->qc_report1_filename }} 
          QC Report 2: {{ $enrObj->qc_report2_filename }}
          QC Report 3: {{ $enrObj->qc_report3_filename }}
          QC CoA: {{ $enrObj->qc_coa_filename }}
          Entered By: {{ $enrObj->qc_infos_entered_by }}; 
          Date: {{ $enrObj->qc_infos_date_entered  }}

        </td>
      </tr>


      <tr>
        <td>
          QA Comment: {{ $enrObj->qa_enrollment_comment }} 
          QA Other Info: {{ $enrObj->qa_other_infos }} 
          Entered By: {{ $enrObj->qa_infos_entered_by }}; 
          Date: {{ $enrObj->qa_infos_date_entered  }}
        </td>
      </tr>


      <tr>
        <td>
          Decision Comment: {{ $enrObj->decision_comment }} 
          Decision: {{ $enrObj->enrollment_decision }} 
          Entered By: {{ $enrObj->decision_entered_by }}; 
          Date: {{ $enrObj->decision_date_entered  }}
        </td>
      </tr>


      <tr>
        <td>
          <label>Patient Unique ID:</label> {{ $enrObj->patient_unique_id }}; 
          BMR ID: {{ $enrObj->linked_bmr_id }} ;
          Sample ID: {{ $enrObj->linked_sample_id }} ;
          Entered By: {{ $enrObj->decision_entered_by }};
          Other Info: {{ $enrObj->other_infos }} ;
          Comment: {{ $enrObj->administrative_comment }};
          Date: {{ $enrObj->decision_date_entered  }};
        </td>
      </tr>


      <tr>
        <td>
          Transplant Date: {{ $enrObj->transplantation_date }}; 
          Transplant Info: {{ $enrObj->transplantation_info }} ;
          Comments: {{ $enrObj->transplantation_comments }} ;
          Entered By: {{ $enrObj->transplant_info_entered_by }};
          Date: {{ $enrObj->transplant_info_date_entered  }};
        </td>
      </tr>
      <tr>
        <td>
          Recorded Create On: {{ $enrObj->created_at }}; 
          Record Last Updated On: {{ $enrObj->updated_at }} ;
        </td>
      </tr>

      <tr>
        <td>
          <label>Patient Enrollment Comment</label>
          <input wire:model.defer="form.decision_comment" type="text" class="form-control" placeholder="Patient Enrollment Comment">
        </td>
      </tr> 
      <tr>
        <td>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group">
              <div class="form-check">
                <input wire:model.defer="form.enrollment_decision" value="yes" class="form-check-input" type="radio" name="radio1">
                <label class="form-check-label">Enrollment Complete</label>
              </div>
              <div class="form-check">
                <input wire:model.defer="form.enrollment_decision" value="no" class="form-check-input" type="radio" name="radio1">
                <label class="form-check-label">Enrollment Abandonded</label>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <button wire:click="fnSaveEnrollmentDecision()" 
          class="btn btn-info text-white font-normal mt-3 rounded">COMPLETE ENROLLMENT</button>
        </td>
      </tr>                                    
    </tbody>
  </table>
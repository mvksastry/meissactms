  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          OPD ID: {{ $enrObj->opd_id }} </br>
          IPD ID: {{ $enrObj->discectomy_ipd_id }} </br>
          Admission Date: {{ $enrObj->discectomy_admission_date }}
        </td>
      </tr>

      <tr>
        <td>
          Discectomy Date: {{ $enrObj->discectomy_date }} </br>
          Surgenos: {{ $enrObj->surgeons_names }} </br>
          Other: {{ $enrObj->discectomy_other_info }} </br>
          Comment: {{ $enrObj->discectomy_comments }} </br>
          Entered By: {{ $enrObj->discectomy_comments }} </br>
          Date: {{ $enrObj->disc_info_date_entered }}
        </td>
      </tr>

      <tr>
        <td>
          Discectomy Sample Description: {{ $enrObj->discectomy_sample_desc }}</br>
          Number of Samples: {{ $enrObj->discectomy_sample_number }} </br>
          Comment: {{ $enrObj->discectomy_sample_comments }}</br>
          Entered By: {{ $enrObj->discectomy_sample_info_entered_by }} </br>
          Date: {{ $enrObj->discectomy_sample_info_date_entered }}
        </td>
      </tr>

      <tr>
        <td>
          QC Report 1: {{ $enrObj->qc_report1_filename }} </br>
          QC Report 2: {{ $enrObj->qc_report2_filename }} </br>
          QC Report 3: {{ $enrObj->qc_report3_filename }} </br>
          QC CoA: {{ $enrObj->qc_coa_filename }} </br>
          Entered By: {{ $enrObj->qc_infos_entered_by }} </br>
          Date: {{ $enrObj->qc_infos_date_entered }}

        </td>
      </tr>

      <tr>
        <td>
          QA Comment: {{ $enrObj->qa_enrollment_comment }} </br>
          QA Other Info: {{ $enrObj->qa_other_infos }} </br>
          Entered By: {{ $enrObj->qa_infos_entered_by }} </br>
          Date: {{ $enrObj->qa_infos_date_entered }}
        </td>
      </tr>

      <tr>
        <td>
          Decision Comment: {{ $enrObj->decision_comment }} </br>
          Decision: {{ $enrObj->enrollment_decision }} </br>
          Entered By: {{ $enrObj->decision_entered_by }} </br>
          Date: {{ $enrObj->decision_date_entered }}
        </td>
      </tr>

      <tr>
        <td>
          <label>Patient Unique ID:</label> {{ $enrObj->patient_unique_id }} </br>
          BMR ID: {{ $enrObj->mbr_id }} </br>
          Sample ID: {{ $enrObj->linked_sample_id }} </br>
          Entered By: {{ $enrObj->decision_entered_by }} </br>
          Other Info: {{ $enrObj->other_infos }} </br>
          Comment: {{ $enrObj->administrative_comment }} </br>
          Date: {{ $enrObj->decision_date_entered }}
        </td>
      </tr>

      <tr>
        <td>
          Transplant Date: {{ $enrObj->transplantation_date }}</br>
          Transplant Info: {{ $enrObj->transplantation_info }} </br>
          Comments: {{ $enrObj->transplantation_comments }} </br>
          Entered By: {{ $enrObj->transplant_info_entered_by }}</br>
          Date: {{ $enrObj->transplant_info_date_entered }}
        </td>
      </tr>
      <tr>
        <td>
          Recorded Created On: {{ $enrObj->created_at }}</br>
          Record Last Updated On: {{ $enrObj->updated_at }} </br>
        </td>
      </tr>

      <tr>
        <td>
          <label>Patient Enrollment Comment</label>
          <input wire:model.defer="form.decision_comment" type="text" class="form-control"
            placeholder="Patient Enrollment Comment">
        </td>
      </tr>
      <tr>
        <td>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group">
              <div class="form-check">
                <input wire:model.defer="form.enrollment_decision" value="yes" class="form-check-input"
                  type="radio" name="radio1">
                <label class="form-check-label">Enrollment Complete</label>
              </div>
              <div class="form-check">
                <input wire:model.defer="form.enrollment_decision" value="no" class="form-check-input"
                  type="radio" name="radio1">
                <label class="form-check-label">Excluded from Enrollment</label>
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

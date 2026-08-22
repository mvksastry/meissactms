  @php
    $step_code = config('ctms.steps');
  @endphp
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
          Status code: {{ $step_code[$enrObj->discec_status_code] }}</br>
          Entered By: {{ $enrObj->disc_info_entered_by }} </br>
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
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th align="center">File Code</th>
                <th align="center">Report Cateogry</th>
                <th align="center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($enFileObj as $row)
                <tr>
                  <td>
                    {{ $row->file_code }}
                  </td>
                  <td>
                    {{ $row->report_category }}
                  </td>
                  <td>
                    <button wire:click="fnDownLoadQCfile('{{ $row->file_uuid }}')"
                      class="btn btn-success text-white font-normal rounded">DOWNLOAD
                      {{ $row->report_category }}</button>
                  </td>
                </tr>
              @endforeach
              Other Infos: {{ $enrObj->qc_other_infos }}</br>
              Comment: {{ $enrObj->qc_enrollment_comment }} </br>
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
                <input wire:model.defer="form_f.enrollment_decision" value="330" class="form-check-input"
                  type="radio" name="radio1">
                <label class="form-check-label">Enrollment Aborted</label>
              </div>
              <div class="form-check">
                <input wire:model.defer="form_f.enrollment_decision" value="340" class="form-check-input"
                  type="radio" name="radio1">
                <label class="form-check-label">Enrollment Complete</label>
              </div>
              </br>
              @error('form.code330340')
                <span class="text-danger">{{ $message }}</span>
              @enderror
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

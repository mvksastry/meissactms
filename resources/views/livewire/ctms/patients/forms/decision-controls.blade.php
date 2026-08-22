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
          <button class='btn btn-secondary text-white font-normal rounded'>
            OPD ID: {{ $enrObj->opd_id }}</button> &nbsp;&nbsp;&nbsp;&nbsp;
          <button class='btn btn-secondary text-white font-normal rounded'>
            IPD ID: {{ $enrObj->discectomy_ipd_id }} </button> &nbsp;&nbsp;&nbsp;&nbsp;
          <button class='btn btn-secondary text-white font-normal rounded'>
            Admission Date: {{ $enrObj->discectomy_admission_date }} </button> &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
      </tr>

      <tr>
        <td>
          @include('livewire.ctms.patients.decision.discectomy-table')
        </td>
      </tr>

      <tr>
        <td>
          @include('livewire.ctms.patients.decision.sample-table')
        </td>
      </tr>
      <tr>
        <td>
          @include('livewire.ctms.patients.decision.qc-table')

      <tr>
        <td>
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td>
                  @foreach ($enFileObj as $row)
                    <button wire:click="fnDownLoadQCfile('{{ $row->file_uuid }}')"
                      class='btn btn-success text-white font-normal rounded'>
                      {{ $row->report_category }} </button> &nbsp;&nbsp;&nbsp;&nbsp;
                  @endforeach
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          @include('livewire.ctms.patients.decision.qa-table')
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

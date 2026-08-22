  @if ($this->enrObj->qc_status_code != 240)
    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="6" align="center">QC Comments -- Part 1</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>
            <div class="form-group">
              <div class="form-check">
                <input wire:model.live="form_d.code230240" class="form-check-input" value="230" type="radio"
                  name="code1413">
                <label class="form-check-label">QC-check-1-failed</label>
              </div>
              <div class="form-check">
                <input wire:model.live="form_d.code230240" class="form-check-input" value="240" type="radio"
                  name="code1413">
                <label class="form-check-label">QC-check-1-success</label>
              </div>
              </br>
              @error('form.code230240')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <label>Report 1</label>
            <input wire:model.defer="form_x.qc_report_1" type="file" class="form-control"
              placeholder="Unique ID Number">
            @error('form_x.qc_report_1')
              <span class="text-danger error">{{ $message }}</span>
            @enderror
          </td>
          <td>
            <label>Report 1 Description</label>
            <input wire:model.defer="form_d.qc_report1_description" id="other_infos_2" type="text"
              class="form-control" placeholder="Other Infos 2">
          </td>
        </tr>
        <tr>
          <td>
            <label>Report 2</label>
            <input wire:model.defer="form_x.qc_report_2" type="file" class="form-control" placeholder="MFR Code">
            @error('form_x.qc_report_2')
              <span class="text-danger error">{{ $message }}</span>
            @enderror
          </td>
          <td>
            <label>Report 2 Description</label>
            <input wire:model.defer="form_d.qc_report2_description" id="other_infos_2" type="text"
              class="form-control" placeholder="Other Infos 2">
          </td>
        </tr>
        <tr>
          <td>
            <button wire:click="fnSaveEnrolQCPart1Data()"
              class="btn btn-success text-white font-normal mt-3 rounded">ADD
              QC PART-1 REPORT</button>
          </td>
        </tr>
      </tbody>
    </table>
  @else
    <label class="text-danger">QC Data Part - 1 Complete</label>
  @endif
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">QC Comments -- Part 2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="form-group">
            <div class="form-check">
              <input wire:model.live="form_i.code280300" class="form-check-input" value="280" type="radio"
                name="code2019">
              <label class="form-check-label">mfg-status-evaluated</label>
            </div>
            <div class="form-check">
              <input wire:model.live="form_i.code280300" class="form-check-input" value="290" type="radio"
                name="code2019">
              <label class="form-check-label">QC-check-2-failed</label>
            </div>
            <div class="form-check">
              <input wire:model.live="form_i.code280300" class="form-check-input" value="300" type="radio"
                name="code2019">
              <label class="form-check-label">QC-check-2-success</label>
            </div>
            </br>
            @error('form.code280300')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
      </tr>

      <tr>
        <td>
          <label>Comprehensive Batch Report 3</label>
          <input wire:model.defer="form_x.qc_report_3" type="file" class="form-control" placeholder="Sample ID">
          @error('form_x.qc_report_3')
            <span class="text-danger error">{{ $message }}</span>
          @enderror
        </td>
        <td>
          <label>Report 3 Description</label>
          <input wire:model.defer="form_i.qc_report3_description" id="other_infos_2" type="text" class="form-control"
            placeholder="Other Infos 2">
        </td>
      </tr>
      <tr>
        <td>
          <label>Certificate of Analysis</label>
          <input wire:model.defer="form_x.qc_coa" id="other_infos_2" type="file" class="form-control"
            placeholder="Other Infos 2">
          @error('form_x.qc_coa')
            <span class="text-danger error">{{ $message }}</span>
          @enderror
        </td>
        <td>
          <label>C o A Description</label>
          <input wire:model.defer="form_i.qc_coa_description" id="other_infos_2" type="text" class="form-control"
            placeholder="Other Infos 2">
        </td>
      </tr>
      <tr>
        <td>
          <label>Other Info</label>
          <input wire:model.defer="form_i.qc_other_infos" type="text" class="form-control"
            placeholder="Other Infos 1">
        </td>
      </tr>
      <tr>
        <td>
          <label>Comment</label>
          <input wire:model.defer="form_i.qc_enrollment_comment" id="other_infos_2" type="text" class="form-control"
            placeholder="Other Infos 2">
        </td>
      </tr>
      <tr>
        <td>
          <button wire:click="fnSaveEnrolPart2QCData()"
            class="btn btn-success text-white font-normal mt-3 rounded">ADD
            QC PART -2 REPORT</button>
        </td>
      </tr>
    </tbody>
  </table>

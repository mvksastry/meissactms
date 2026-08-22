  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">QA Comments</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="form-group">
            <div class="form-check">
              <input wire:model.live="form_e.code310320" class="form-check-input" value="310" type="radio"
                name="code2221">
              <label class="form-check-label">QA-rejected</label>
            </div>
            <div class="form-check">
              <input wire:model.live="form_e.code310320" class="form-check-input" value="320" type="radio"
                name="code2221">
              <label class="form-check-label">QA-accepted</label>
            </div>
            </br>
            @error('form.code310320')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <label>Other Infos</label>
          <input wire:model.defer="form_e.qa_other_infos" type="text" class="form-control"
            placeholder="Other Infos 1">
        </td>
      </tr>
      <tr>
        <td>
          <label>Comments</label>
          <input wire:model.defer="form_e.qa_enrollment_comment" type="text" class="form-control"
            placeholder="Unique ID Number">
        </td>
      </tr>
      <tr>
        <td>
          <button wire:click="fnSaveEnrolQAData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD QA
            REPORT</button>
        </td>
      </tr>
    </tbody>
  </table>

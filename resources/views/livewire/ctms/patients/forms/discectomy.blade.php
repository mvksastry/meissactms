  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <label>Opd ID*</label>
          <input wire:model="form_a.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
        </td>
        <td>
          <label>In Patient ID (Discectomy)</label>
          <input wire:model.defer="form_a.discectomy_ipd_id" id="in_patient_id" type="text" class="form-control"
            placeholder="In Patient ID">
        </td>
        <td>
          <label>Admission Date (Discectomy)</label>
          <input wire:model.defer="form_a.discectomy_admission_date" id="aadhar_id" type="date" value="null"
            class="form-control" placeholder="Admission Date">
        </td>
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
          <label>Discectomy Date</label>
          <input wire:model.defer="form_a.discectomy_date" type="date" class="form-control"
            placeholder="Surgery Date">
        </td>
      </tr>
      <tr>
        <td>
          <label>Names of Surgenons</label>
          <input wire:model.defer="form_a.surgeons_names" type="text" class="form-control"
            placeholder="Surgery Date">
        </td>
      </tr>

      <tr>
        <td>
          <div class="form-group">
            <div class="form-check">
              <input wire:model.live="form_a.code8910" class="form-check-input" value="7" type="radio"
                name="radio1">
              <label class="form-check-label">patient-aborted-at-discectomy</label>
            </div>
            <div class="form-check">
              <input wire:model.live="form_a.code8910" class="form-check-input" value="8" type="radio"
                name="radio1">
              <label class="form-check-label">discectomy-completed</label>
            </div>
            <div class="form-check">
              <input wire:model.live="form_a.code8910" class="form-check-input" value="10" type="radio"
                name="radio1">
              <label class="form-check-label">discectomy-sample-collected</label>
            </div>
            </br>
            @error('form.code8910')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
      </tr>

      <tr>
        <td>
          <label>Other Info</label>
          <input wire:model.defer="form_a.discectomy_other_info" type="text" class="form-control"
            placeholder="Fitness Info">
        </td>
      </tr>
      <tr>
        <td>
          <label>Comments</label>
          <input wire:model.defer="form_a.discectomy_comments" type="text" class="form-control"
            placeholder="Comments">
        </td>
      </tr>
      <tr>
        <td>
          <button wire:click="fnSaveDiscectomyData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD
            DISCECTOMY DATA</button>
        </td>
      </tr>
    </tbody>
  </table>

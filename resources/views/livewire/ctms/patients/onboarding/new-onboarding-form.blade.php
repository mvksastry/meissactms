  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Center Control Information</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="1">
          <label class="text-danger">Opd ID*</label>
          <input wire:model="form.opd_id" class="form-control" placeholder="Out Patient ID" id="opd_id"
            wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label class="text-danger">In Patient ID*</label>
          <input wire:model="form.inpatient_id" placeholder="In Patient ID" class="form-control"
            wire:model.defer="form.in_patient_id" id="in_patient_id">
        </td>
        <td colspan="1">
          <label class="text-danger">OPD/IPD/Record Date*</label>
          <input wire:model="form.admission_date" class="form-control" id="admission_date"
            wire:model="form.admission_date" type="date">
        </td>
        <td colspan="1">
          <label class="text-danger">Subject ID*</label>
          <input wire:model="form.subject_id" class="form-control" id="subject_id" wire:model="form.subject_id"
            type="text">
        </td>
      </tr>
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Personal Identifications</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="1">
          <label class="text-danger">Name*</label>
          <input wire:model="form.name" id="name" type="text" value="null" class="form-control"
            placeholder="Full Name">
          <div>
            @error('form.name')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
        <td colspan="1">
          <label class="text-danger">Gender*</label>
          <input wire:model.defer="form.gender" id="item_desc" type="text" value="null" class="form-control"
            placeholder="Gender">
          <div>
            @error('form.gender')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
        <td colspan="1">
          <label class="text-danger">Date of Birth*</label>
          <input wire:model="form.date_of_birth" id="date_of_birth" type="date" class="form-control"
            placeholder="Date of Birth">
          <div>
            @error('form.date_of_birth')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
        <td colspan="1">
          <label class="text-secondary">Age* (Auto Calculated)</label>
          <input wire:model.defer="form.age" id="age" type="number" class="form-control" placeholder="Age">
          <div>
            @error('form.age')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
        <td colspan="1">
          <label class="text-danger">Primary Phone*</label>
          <input wire:model="form.primary_phone_number" id="primary_phone_number" type="number" value="null"
            class="form-control" placeholder="Primary Phone Number">
          <div>
            @error('form.primary_phone_number')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>
        <td colspan="1">

        </td>
      </tr>

    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2">
          <label>Comment</label>
          <input wire:model.defer="form.comment_entered_by" id="comment_entered_by" type="text" value="null"
            class="form-control" placeholder="Comment">
        </td>
      </tr>
      <tr>
        <td>
          <button wire:click="fnSavePrimaryInfo()" class="btn btn-success text-white font-normal mt-3 rounded">POST
            ON-BOARDING REQUEST</button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

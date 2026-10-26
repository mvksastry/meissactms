  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
    </thead>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Center Control - Name - Aadhar iD</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <label class="text-danger">Opd ID*</label>
          <input wire:model="form.opd_id" class="form-control" placeholder="Out Patient ID" id="opd_id"
            wire:model="form.opd_id" type="text">
        </td>

        <td>
          <label class="text-danger">Name*</label>
          <input wire:model="form.name" id="name" type="text" value="null" class="form-control"
            placeholder="Full Name">
          <div>
            @error('form.name')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
        </td>

        <td>
          <label class="text-danger">Aadhar Number*</label>
          <input wire:model="form.aadhar_id" id="aadhar_id" type="number" value="null" class="form-control"
            placeholder="Aadhar Number">
          <div>
            @error('form.aadhar_id')
              <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>
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

  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group">
              <div class="form-check">
                <input wire:model.defer="form_h.transplant_status" value="26" class="form-check-input" type="radio"
                  name="radio1">
                <label class="form-check-label">Transplantation Aborted</label>
              </div>
              <div class="form-check">
                <input wire:model.defer="form_h.transplant_status" value="27" class="form-check-input"
                  type="radio" name="radio1">
                <label class="form-check-label">Transplantation Complete</label>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <label>Date of Transplantation</label>
          <input wire:model.defer="form_h.transplantation_date" type="date" class="form-control"
            placeholder="Transplantation Date">
        </td>
      </tr>
      <tr>
        <td>
          <label>Transplant Info</label>
          <input wire:model.defer="form_h.transplant_info" type="text" class="form-control"
            placeholder="Fitness Info">
        </td>
      </tr>
      <tr>
        <td>
          <label>Transplantation Comments</label>
          <input wire:model.defer="form_h.transplantation_comments" type="text" class="form-control"
            placeholder="Comments">
        </td>
      </tr>
      <tr>
        <td>
          <button wire:click="fnSaveTransplantationData()"
            class="btn btn-success text-white font-normal mt-3 rounded">ADD TRANSPLANTATION DATA</button>
        </td>
      </tr>
    </tbody>
  </table>

  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Patient Selection Comment</label>
          <input wire:model.defer="form.surgery_date" type="text" class="form-control" placeholder="Surgery Date">
        </td>
      </tr>
      <tr>
        <td>
          <label>Patient Rejection Comment</label>
          <input wire:model.defer="form.fitness" type="text" class="form-control" placeholder="Fitness Info">
        </td>
      </tr> 
      <tr>
        <td>
          <label>Final Comments</label>
          <input wire:model.defer="form.comments" type="text" class="form-control" placeholder="Comments">
        </td>
      </tr> 

      <tr>
        <td>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1">
                <label class="form-check-label">Enrollment Complete</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1">
                <label class="form-check-label">Enrollment Rejected</label>
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
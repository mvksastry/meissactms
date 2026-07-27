  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Surgery Date</label>
          <input wire:model.defer="form.surgery_date" type="text" class="form-control" placeholder="Surgery Date">
        </td>
      </tr>
      <tr>
        <td>
          <label>Fitness Info</label>
          <input wire:model.defer="form.fitness" type="text" class="form-control" placeholder="Fitness Info">
        </td>
      </tr> 
      <tr>
        <td>
          <label>Comments</label>
          <input wire:model.defer="form.comments" type="text" class="form-control" placeholder="Comments">
        </td>
      </tr> 
      <tr>        
        <td>
          <label>Sample Description</label>
          <input wire:model.defer="form.sample_description" type="text" class="form-control" placeholder="Sample Description">
        </td>
      </tr>
      <tr>
        <td>
          <label>Number of Samples</label>
          <input wire:model.defer="form.number_of_samples" id="number_of_samples" type="text" class="form-control" placeholder="Number of Samples">
        </td>
      </tr>                                    
    </tbody>
  </table>
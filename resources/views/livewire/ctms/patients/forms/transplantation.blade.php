  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Date Transplantation</label>
          <input wire:model.defer="form.surgery_date" type="text" class="form-control" placeholder="Surgery Date">
        </td>
      </tr>
      <tr>
        <td>
          <label>Transplant Fitness Info</label>
          <input wire:model.defer="form.fitness" type="text" class="form-control" placeholder="Fitness Info">
        </td>
      </tr> 
      <tr>
        <td>
          <label>Trnsplantation Comments</label>
          <input wire:model.defer="form.comments" type="text" class="form-control" placeholder="Comments">
        </td>
      </tr>      
    <tr>
      <td>
      <button wire:click="fnSaveTransplantationData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD TRANSPLANTATION DATA</button>
      </td>
    </tr>                               
    </tbody>
  </table>
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
          <input wire:model.defer="form.transplantation_date" type="text" class="form-control" placeholder="Transplantation Date">
        </td>
      </tr>
      <tr>
        <td>
          <label>Transplant Fitness Info</label>
          <input wire:model.defer="form.transplant_fitness" type="text" class="form-control" placeholder="Fitness Info">
        </td>
      </tr> 
      <tr>
        <td>
          <label>Transplantation Comments</label>
          <input wire:model.defer="form.transplantation_comments" type="text" class="form-control" placeholder="Comments">
        </td>
      </tr>      
    <tr>
      <td>
      <button wire:click="fnSaveTransplantationData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD TRANSPLANTATION DATA</button>
      </td>
    </tr>                               
    </tbody>
  </table>
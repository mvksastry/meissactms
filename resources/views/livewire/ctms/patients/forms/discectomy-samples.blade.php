  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
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
      <tr>
        <td>
          <label>Comments</label>
          <input wire:model.defer="form.comments" type="text" class="form-control" placeholder="Comments">
        </td>
      </tr>  
      <tr>
        <td>
        <button wire:click="fnSaveDiscectomySamplesData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD DISCECTOMY SAMPLES DATA</button>
        </td>
      </tr>                               
    </tbody>
  </table>
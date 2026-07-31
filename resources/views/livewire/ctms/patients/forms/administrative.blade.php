  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Unique ID Number</label>
          <input wire:model.defer="form.unique_id_number" type="text" class="form-control" placeholder="Unique ID Number">
        </td>
        <td>
          <label>Linked BMR Code</label>
          <input wire:model.defer="form.bmr_code" type="text"  class="form-control" placeholder="MFR Code">
        </td>
        <td>
          <label>Sample ID</label>
          <input wire:model.defer="form.sample_ids" type="text"  class="form-control" placeholder="Sample ID">
        </td>
      </tr> 
      <tr>
        <td colspan="3">
          <label>Other Infos</label>
          <input wire:model.defer="form.other_infos" type="text" class="form-control" placeholder="Other Infos 1" >
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <label>Comment</label>
          <input wire:model.defer="form.admin_comment" id="other_infos_2" type="text" class="form-control" placeholder="Other Infos 2" >
        </td>
      </tr>        
      <tr>
        <td>
          <button wire:click="fnSaveEnrollmentIDs()" class="btn btn-info text-white font-normal mt-3 rounded">ASSIGN IDS</button>
        </td>
      </tr>                            
    </tbody>
  </table>
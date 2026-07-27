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
          <label>MFR Code</label>
          <input wire:model.defer="form.mfr_code" type="text"  class="form-control" placeholder="MFR Code">
        </td>
        <td>
          <label>Sample ID</label>
          <input wire:model.defer="form.sample_id" type="text"  class="form-control" placeholder="Sample ID">
        </td>
      </tr> 
      <tr>
        <td colspan="3">
          <label>Other Infos 1</label>
          <input wire:model.defer="form.other_infos_1" type="text" class="form-control" placeholder="Other Infos 1" >
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <label>Other Infos 2</label>
          <input wire:model.defer="form.other_infos_2" id="other_infos_2" type="text" class="form-control" placeholder="Other Infos 2" >
        </td>
      </tr>                                    
    </tbody>
  </table>
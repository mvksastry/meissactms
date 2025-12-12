  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="1">
          <label>Consumption Non Tobacco Gutka Pan*</label>
          <input wire:model="form.consumption_non_tgp" id="consumption_non_tgp" type="text" value="null" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Tobacco*</label>
          <input wire:model="form.consumption_tobacco" id="consumption_tobacco" type="text" value="null" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Gutka*</label>
          <input wire:model.defer="form.consumption_gutka" id="consumption_gutka" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Pan / Masala*</label>
          <input wire:model="form.consumption_pan" id="consumption_pan_masala" type="text" value="null" class="form-control" placeholder="Description">
        </td>
        <td colspan="2">
          <label>Any Other*</label>
          <input wire:model="form.anyother_habbits" id="anyother_habbits" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
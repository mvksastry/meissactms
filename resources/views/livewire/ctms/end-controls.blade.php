  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form.entered_by" id="entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Verified By*</label>
          <input wire:model.defer="form.verified_by" id="consumption_gutka" type="text" value="null" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Verified Date*</label>
          <input wire:model.defer="form.verified_date" id="consumption_gutka" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entry Sealed By*</label>
          <input wire:model="form.entry_sealed_by" id="entry_sealed_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
        <td colspan="2">
          <label>Sealed Date*</label>
          <input wire:model="form.entry_sealed_date" id="entry_sealed_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  
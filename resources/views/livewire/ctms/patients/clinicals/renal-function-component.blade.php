<div>
    {{-- The Master doesn't talk, he acts. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Sr.Uric Acd</label>
          <input wire:model.defer="form.sr_uric_acid" type="text" class="form-control" placeholder="Uric Acid">
        </td>

      </tr>
      <tr>
        <td colspan="6">
          <label>Uric Acid Report File*</label>
          <input wire:model.defer="form.uricacid_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>       
    </tbody>
  </table>
</div>

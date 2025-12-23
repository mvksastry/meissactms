<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Chemical Examination</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Proteins</label>
          <input wire:model.defer="form.proteins" type="text" class="form-control" placeholder="Proteins" >
        </td>
        <td>
          <label>Sugar</label>
          <input wire:model.defer="form.sugar" type="text" class="form-control" placeholder="Sugar" >
        </td>
        <td>
          <label>Ketones</label>
          <input wire:model.defer="form.ketones" type="text" class="form-control" placeholder="Ketones" >
        </td>

        <td>
          <label>Procalcitonin*</label>
          <input wire:model.defer="form.procalcitonin" type="text" class="form-control" placeholder="Precalcitonin" >
        </td>
      </tr>

      <tr>
        <td>
          <label>Bile salts</label>
          <input wire:model.defer="form.bile_salts" type="text" class="form-control" placeholder="Bile Salts" >
        </td>
        <td>
          <label>Bile Pigments</label>
          <input wire:model.defer="form.bile_pigments" type="text" class="form-control" placeholder="Bile Pigments" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Chemical Examination Report File*</label>
          <input wire:model.defer="form.ce_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
</div>

  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Pathology Lab</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>ESR</label>
          <input wire:model.defer="form.esr" type="text" class="form-control" placeholder="ESR">
        </td>
        <td>
          <label>PT - Patient</label>
          <input wire:model.defer="form.pt_patient" type="text" class="form-control" placeholder="PT - Patient">
        </td>
        <td>
          <label>PT - Control</label>
          <input wire:model.defer="form.pt_control" type="text" class="form-control" placeholder="PT - Control" >
        </td>
        <td>
          <label>INR</label>
          <input wire:model.defer="form.inr" type="text" class="form-control" placeholder="INR" >
        </td>
        <td>
          <label>ISI</label>
          <input wire:model.defer="form.isi" type="text" class="form-control" placeholder="ISI" >
        </td>
        <td colspan="6">
          <label>Report File</label>
          <input wire:model.defer="form.path_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                  
    </tbody>
  </table>
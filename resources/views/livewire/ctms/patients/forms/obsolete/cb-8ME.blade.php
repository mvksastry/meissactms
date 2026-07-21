  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Microscopic Examination</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Pus Cells</label>
          <input wire:model.defer="form.pus_cells" id="oande" type="text" class="form-control" placeholder="Pus Cells">
        </td>
        <td>
          <label>Epithelial Cells</label>
          <input wire:model.defer="form.epithelial_cells" id="pr" type="text" class="form-control" placeholder="Epothelian Cells">
        </td>
        <td>
          <label>RBCs</label>
          <input wire:model.defer="form.rbcs" id="temperature" type="text" class="form-control" placeholder="RBC" >
        </td>
        <td>
          <label>Yeast Cells</label>
          <input wire:model.defer="form.yeast_cells" id="bp_systolic" type="text" class="form-control" placeholder="Yeast Cells" >
        </td>
        <td>
          <label>Bacteria</label>
          <input wire:model.defer="form.bacteria" id="bp_diastolic" type="text" class="form-control" placeholder="Bacteria" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Microscopi Exam Lab Report File*</label>
          <input wire:model.defer="form.me_report_file" id="lab_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
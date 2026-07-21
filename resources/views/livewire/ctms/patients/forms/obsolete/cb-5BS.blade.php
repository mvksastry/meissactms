  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Blood Sugar</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Fasting</label>
          <input wire:model.defer="form.fasting" type="text" class="form-control" placeholder="Fasting">
        </td>
        <td>
          <label>Random</label>
          <input wire:model.defer="form.random" type="text" class="form-control" placeholder="Random">
        </td>
        <td>
          <label>Post-Prandial</label>
          <input wire:model.defer="form.post_prandial" type="text" class="form-control" placeholder="Post Prandial" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Blood Sugar Report File*</label>
          <input wire:model.defer="form.bloodsugar_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>     
      <tr>
        <td>
          <label>CRP</label>
          <input wire:model.defer="form.crp" type="text" class="form-control" placeholder="CRP" >
        </td>
        <td colspan="5">
          <label>CRP Report File</label>
          <input wire:model.defer="form.crp_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>
      <tr>
        <td>
          <label>IL-6</label>
          <input wire:model.defer="form.il6" type="text" class="form-control" placeholder="IL-6" >
        </td>
        <td colspan="5">
          <label>IL-6 Report File*</label>
          <input wire:model.defer="form.il6_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                               
    </tbody>
  </table>
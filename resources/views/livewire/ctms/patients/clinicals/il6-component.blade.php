<div>
    {{-- Do your work, then step back. --}}
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Blood Sugar</th>
      </tr>
    </thead>
    <tbody>   
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
</div>

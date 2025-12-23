<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">Uring Routine</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Physical Examination</label>
          <input wire:model.defer="form.physical_exam" type="text" class="form-control" placeholder="P/A" >
        </td>
        <td>
          <label>Quantity</label>
          <input wire:model.defer="form.quantity" type="text" class="form-control" placeholder="CNS" >
        </td>
        <td>
          <label>Colour</label>
          <input wire:model.defer="form.colour" type="text" class="form-control" placeholder="CBC" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Appearance</label>
          <input wire:model.defer="form.appearance" type="text" class="form-control" placeholder="ESR" >
        </td>
        <td>
          <label>Dposits</label>
          <input wire:model.defer="form.deposits" type="text" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>pH</label>
          <input wire:model.defer="form.ph" type="text" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>Specific Gravity</label>
          <input wire:model.defer="form.specific_gravity" type="text" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Microscopic Report File*</label>
          <input wire:model.defer="form.me_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>       

        <td colspan="6">
          <label>Microscopi Exam Lab Report File*</label>
          <input wire:model.defer="form.melr_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
</div>

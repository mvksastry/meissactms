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
        <td>
          <label>Blood Urea</label>
          <input wire:model.defer="form.blood_urea" type="text" class="form-control" placeholder="Blood Urea">
        </td>
        <td>
          <label>Urea</label>
          <input wire:model.defer="form.urea" type="text" class="form-control" placeholder="Urea" >
        </td>
        <td>
          <label>Blood Urea Nitrogen</label>
          <input wire:model.defer="form.blood_urea_nitrogen" type="text" class="form-control" placeholder="Blood Urea Nitrogen" >
        </td>
        <td>
          <label>Serum Creatinine</label>
          <input wire:model.defer="form.serum_creatinine" type="text" class="form-control" placeholder="Serum Creatinine" >
        </td>
      </tr>

      <tr>
        <td colspan="6">
          <label>Uric Acid Report File*</label>
          <input wire:model.defer="form.uricacid_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>      
      <tr>
        <td colspan="6">
          <label>BU & BUN Report File*</label>
          <input wire:model.defer="form.bubun_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr> 
            <tr>
        <td colspan="6">
          <label>Creatinine Report File</label>
          <input wire:model.defer="form.creatine_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr> 


    </tbody>
  </table>
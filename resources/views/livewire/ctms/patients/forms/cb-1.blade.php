  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Blood Group and Rh</label>
          <input wire:model.defer="form.bg_rh" type="text" value="null" class="form-control" placeholder="O E">
        </td>
        <td>
          <label>Temperature*</label>
          <input wire:model.defer="form.temperature" type="text" value="null" class="form-control" placeholder="Temperature" >
        </td>
        <td>
          <label>BP-Systolic*</label>
          <input wire:model.defer="form.bp_systolic" type="text" value="null" class="form-control" placeholder="BP Systolic" >
        </td>
        <td>
          <label>BP-Diastolic*</label>
          <input wire:model.defer="form.bp_diastolic" type="text" value="null" class="form-control" placeholder="BP Diastolic" >
        </td>
      </tr>
      <tr>
        <td>
          <label>O E*</label>
          <input wire:model.defer="form.oande" type="text" value="null" class="form-control" placeholder="O E">
        </td>
        <td>
          <label>PR*</label>
          <input wire:model.defer="form.pr" type="text" value="null" class="form-control" placeholder="PR">
        </td>

      </tr>
      <tr>
        <td>
          <label>CVS*</label>
          <input wire:model.defer="form.cvs" type="text" value="null" class="form-control" placeholder="CVS" >
        </td>

        <td>
          <label>P/A*</label>
          <input wire:model.defer="form.panda" type="text" value="null" class="form-control" placeholder="P/A" >
        </td>
        <td>
          <label>CNS*</label>
          <input wire:model.defer="form.cns" type="text" value="null" class="form-control" placeholder="CNS" >
        </td>
        <td>
          <label>CBC*</label>
          <input wire:model.defer="form.cbc" type="text" value="null" class="form-control" placeholder="CBC" >
        </td>
      </tr>
      <tr>
        <td>
          <label>ESR*</label>
          <input wire:model.defer="form.esr" type="text" value="null" class="form-control" placeholder="ESR" >
        </td>
        <td>
          <label>CRP*</label>
          <input wire:model.defer="form.crp" type="text" value="null" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>RFT*</label>
          <input wire:model.defer="form.rft" type="text" value="null" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>LFT*</label>
          <input wire:model.defer="form.lft" type="text" value="null" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Clotting Time*</label>
          <input wire:model.defer="form.clotting_time" type="text" value="null" class="form-control" placeholder="Clotting Time" >
        </td>
        <td>
          <label>Bleeding Time*</label>
          <input wire:model.defer="form.bleeding_time" type="text" value="null" class="form-control" placeholder="Bleeding Time" >
        </td>
        <td>
          <label>Prothrombin time*</label>
          <input wire:model.defer="form.prothrombin_time" type="text" value="null" class="form-control" placeholder="Prothrombin Time" >
        </td>

        <td>
          <label>Procalcitonin*</label>
          <input wire:model.defer="form.procalcitonin" type="text" value="null" class="form-control" placeholder="Precalcitonin" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Laboratory Report File*</label>
          <input wire:model.defer="form.lab_report_file" id="lab_report_file" type="text" value="null" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
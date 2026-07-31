  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">QC Comments</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Report 1</label>
          <input wire:model.defer="form_x.qc_report_1" type="file" class="form-control" placeholder="Unique ID Number">
          @error('form_x.qc_report_1') <span class="text-danger error">{{ $message }}</span> @enderror 
        </td>
      </tr> 
      <tr>
        <td>
          <label>Report 2</label>
          <input wire:model.defer="form_x.qc_report_2" type="file"  class="form-control" placeholder="MFR Code">
          @error('form_x.qc_report_2') <span class="text-danger error">{{ $message }}</span> @enderror 
        </td>
      </tr> 
      <tr>
        <td>
          <label>Report 3</label>
          <input wire:model.defer="form_x.qc_report_3" type="file"  class="form-control" placeholder="Sample ID">
          @error('form_x.qc_report_3') <span class="text-danger error">{{ $message }}</span> @enderror 
        </td>
      </tr> 
      <tr>
        <td>
          <label>Certificate of Analysis</label>
          <input wire:model.defer="form_x.qc_coa" id="other_infos_2" type="file" class="form-control" placeholder="Other Infos 2" >
          @error('form_x.qc_coa') <span class="text-danger error">{{ $message }}</span> @enderror 
        </td>
      </tr>
      <tr>
        <td>
          <label>Other Info</label>
          <input wire:model.defer="form.qc_other_infos" type="text" class="form-control" placeholder="Other Infos 1" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Comment</label>
          <input wire:model.defer="form.qc_enrollment_comment" id="other_infos_2" type="text" class="form-control" placeholder="Other Infos 2" >
        </td>
      </tr>       
      <tr>
        <td>
          <button wire:click="fnSaveEnrolQCData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD QC REPORT</button>
        </td>
      </tr>                             
    </tbody>
  </table>

  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center">QA Comments</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="3">
          <label>Other Infos</label>
          <input wire:model.defer="form.qa_other_infos" type="text" class="form-control" placeholder="Other Infos 1" >
        </td>
      </tr>    
      <tr>
        <td>
          <label>Comments</label>
          <input wire:model.defer="form.qa_enrollment_comment" type="text" class="form-control" placeholder="Unique ID Number">
        </td>
      </tr> 
      <tr>
        <td>
          <button wire:click="fnSaveEnrolQAData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD QA REPORT</button>
        </td>
      </tr>                                
    </tbody>
  </table>
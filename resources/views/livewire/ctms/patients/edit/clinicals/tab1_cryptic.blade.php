<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center"> Paitient ID: {{ $uuid }}</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td colspan="1">
          <label>Opd ID*</label>
          <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
        </td>
        <td colspan="1">
          <label>In Patient ID*</label>
          <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
        </td>
        <td colspan="1">
          <label>Admission Date*</label>
          <input wire:model.defer="form.admission_date" id="aadhar_id" type="date" value="null" class="form-control" placeholder="Admission Date">
        </td>
      </tr>
      <tr>
      </tr>  
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>O E*</label>
          <input wire:model.defer="form.o_e" type="text" class="form-control" placeholder="O E">
        </td>
        <td>
          <label>PR*</label>
          <input wire:model.defer="form.pr" type="text" class="form-control" placeholder="PR">
        </td>
        <td>
          <label>Temperature*</label>
          <input wire:model.defer="form.temperature" type="text" class="form-control" placeholder="Temperature" >
        </td>
        <td>
          <label>BP-Systolic*</label>
          <input wire:model.defer="form.bp_systolic" type="text" class="form-control" placeholder="BP Systolic" >
        </td>
        <td>
          <label>BP-Diastolic*</label>
          <input wire:model.defer="form.bp_diastolic" type="text" class="form-control" placeholder="BP Diastolic" >
        </td>
      </tr>
      <tr>
        <td>
          <label>CVS*</label>
          <input wire:model.defer="form.cvs" type="text" class="form-control" placeholder="CVS" >
        </td>

        <td>
          <label>P/A*</label>
          <input wire:model.defer="form.p_a" type="text" class="form-control" placeholder="P/A" >
        </td>
        <td>
          <label>CNS*</label>
          <input wire:model.defer="form.cns" type="text" class="form-control" placeholder="CNS" >
        </td>
        <td>
          <label>CBC*</label>
          <input wire:model.defer="form.cbc" type="text" class="form-control" placeholder="CBC" >
        </td>
      </tr>
      <tr>
        <td>
          <label>ESR*</label>
          <input wire:model.defer="form.esr" type="text" class="form-control" placeholder="ESR" >
        </td>
        <td>
          <label>CRP*</label>
          <input wire:model.defer="form.crp" type="text" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>RFT*</label>
          <input wire:model.defer="form.rft" type="text" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>LFT*</label>
          <input wire:model.defer="form.lft" type="text" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Clotting Time*</label>
          <input wire:model.defer="form.clotting_time" type="text" class="form-control" placeholder="Clotting Time" >
        </td>
        <td>
          <label>Bleeding Time*</label>
          <input wire:model.defer="form.bleeding_time" type="text"  class="form-control" placeholder="Bleeding Time" >
        </td>
        <td>
          <label>Prothrombin time*</label>
          <input wire:model.defer="form.prothrombin_time" type="text" class="form-control" placeholder="Prothrombin Time" >
        </td>

        <td>
          <label>Procalcitonin*</label>
          <input wire:model.defer="form.procalcitonin" type="text" class="form-control" placeholder="Precalcitonin" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Laboratory Report File*</label>
          <input wire:model.defer="form.laboratory_report_file" type="text" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="2" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="2">
        <label>Comment</label>
        <input wire:model="form.comment_entered_by" type="text" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td>
        <label>Entered By*</label>
        <input wire:model="form.entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td>
        <label>Entry Date*</label>
        <input wire:model="form.entry_date" type="date" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnSaveEditedClinicalData()" class="btn btn-warning font-normal mt-3 rounded">EDIT CLINICAL INFO</button>

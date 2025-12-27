<div>
    {{-- The Master doesn't talk, he acts. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th>
          @if($sys_panel)
            @include('livewire.error-alerts-callouts')
          @endif
          @if($msg_panel)
            @include('livewire.error-alerts-callouts')
          @endif
        </th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
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
          <input wire:model.defer="form_l.pus_cells" id="oande" type="text" class="form-control" placeholder="Pus Cells">
        </td>
        <td>
          <label>Epithelial Cells</label>
          <input wire:model.defer="form_l.epithelial_cells" id="pr" type="text" class="form-control" placeholder="Epothelian Cells">
        </td>
        <td>
          <label>RBCs</label>
          <input wire:model.defer="form_l.rbcs" id="temperature" type="text" class="form-control" placeholder="RBC" >
        </td>
        <td>
          <label>Yeast Cells</label>
          <input wire:model.defer="form_l.yeast_cells" id="bp_systolic" type="text" class="form-control" placeholder="Yeast Cells" >
        </td>
        <td>
          <label>Bacteria</label>
          <input wire:model.defer="form_l.bacteria" id="bp_diastolic" type="text" class="form-control" placeholder="Bacteria" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Microscopi Exam Lab Report File*</label>
          <input wire:model.defer="form_l.me_report_file" id="lab_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="2">
          <label>Comment</label>
          <input wire:model.defer="form_l.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_l.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_l.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnMicroscopicExam()" class="btn btn-success font-normal mt-3 rounded">ADD MICROSCOPIC OBS</button>
</div>

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
        <th colspan="6" align="center">Pathology Lab</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>ESR</label>
          <input wire:model.defer="form_j.esr" type="text" class="form-control" placeholder="ESR">
        </td>
        <td>
          <label>PT - Patient</label>
          <input wire:model.defer="form_j.pt_patient" type="text" class="form-control" placeholder="PT - Patient">
        </td>
        <td>
          <label>PT - Control</label>
          <input wire:model.defer="form_j.pt_control" type="text" class="form-control" placeholder="PT - Control" >
        </td>
        <td>
          <label>INR</label>
          <input wire:model.defer="form_j.inr" type="text" class="form-control" placeholder="INR" >
        </td>
        <td>
          <label>ISI</label>
          <input wire:model.defer="form_j.isi" type="text" class="form-control" placeholder="ISI" >
        </td>
        <td colspan="6">
          <label>Report File</label>
          <input wire:model.defer="form_j.path_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_j.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_j.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_j.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnLabExams()" class="btn btn-success font-normal mt-3 rounded">ADD LAB EXAMS</button>
</div>

<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th>
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
        <th colspan="6" align="center">CRP Test</th>
      </tr>
    </thead>
    <tbody>     
      <tr>
        <td>
          <label>CRP</label>
          <input wire:model.defer="form_f.crp" type="text" class="form-control" placeholder="CRP" >
        </td>
        <td colspan="5">
          <label>CRP Report File</label>
          <input wire:model.defer="form_f.crp_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_f.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_f.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_f.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
    <button wire:click="fnCRP()" class="btn btn-success font-normal mt-3 rounded">ADD CRP DATA</button>
</div>

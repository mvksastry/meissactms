<div>
    {{-- Do your work, then step back. --}}
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th>
          @if($message_panel)
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
        <th colspan="6" align="center">Blood Sugar</th>
      </tr>
    </thead>
    <tbody>   
      <tr>
        <td>
          <label>IL-6</label>
          <input wire:model.defer="form_i.il6" type="text" class="form-control" placeholder="IL-6" >
        </td>
        <td colspan="5">
          <label>IL-6 Report File*</label>
          <input wire:model.defer="form_i.il6_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_i.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_i.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_i.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnIl6()" class="btn btn-success font-normal mt-3 rounded">ADD IL6 DATA</button>
</div>

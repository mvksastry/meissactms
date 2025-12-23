<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
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
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Serum Creatinine</label>
          <input wire:model.defer="form_e.serum_creatinine" type="text" class="form-control" placeholder="Serum Creatinine" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Creatinine Report File</label>
          <input wire:model.defer="form_e.creatine_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_e.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_e.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_e.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
    <button wire:click="fnCreatinine()" class="btn btn-success font-normal mt-3 rounded">ADD CREATININE DATA</button>
</div>

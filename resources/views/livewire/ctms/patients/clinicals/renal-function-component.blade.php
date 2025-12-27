<div>
    {{-- The Master doesn't talk, he acts. --}}
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
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Sr.Uric Acd</label>
          <input wire:model.defer="form_m.sr_uric_acid" type="text" class="form-control" placeholder="Uric Acid">
        </td>

      </tr>
      <tr>
        <td colspan="6">
          <label>Uric Acid Report File*</label>
          <input wire:model.defer="form_m.uricacid_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_m.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_m.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_m.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
   <button wire:click="fnRenalFunction()" class="btn btn-success font-normal mt-3 rounded">ADD RENAL FUNCTION</button>

</div>

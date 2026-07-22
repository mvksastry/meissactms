<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th>
          @if($sys_panel)
            @include('livewire.eac_sys_panel')
          @endif
          @if($msg_panel)
            @include('livewire.eac_msg_panel')
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
        <th colspan="6" align="center">Uring Routine</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Physical Examination</label>
          <input wire:model.defer="form_n.physical_exam" type="text" class="form-control" placeholder="Physical Examination" >
        </td>
        <td>
          <label>Quantity (ml)</label>
          <input wire:model.defer="form_n.quantity" type="text" class="form-control" placeholder="Quantity (ml)" >
        </td>
        <td>
          <label>Colour</label>
          <input wire:model.defer="form_n.colour" type="text" class="form-control" placeholder="Colour" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Appearance</label>
          <input wire:model.defer="form_n.appearance" type="text" class="form-control" placeholder="Appearance" >
        </td>
        <td>
          <label>Deposits (Present/Absent)</label>
          <input wire:model.defer="form_n.deposits" type="text" class="form-control" placeholder="Deposits (Present/Absent)" >
        </td>
        <td>
          <label>pH (Number)</label>
          <input wire:model.defer="form_n.ph" type="text" class="form-control" placeholder="pH (Number)" >
        </td>
        <td>
          <label>Specific Gravity (Number)</label>
          <input wire:model.defer="form_n.specific_gravity" type="text" class="form-control" placeholder="Specific Gravity (Number)" >
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
          <input wire:model.defer="form_n.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Comment">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_n.entered_by" id="entered_by" type="text" class="form-control" placeholder="Entered By">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_n.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Entry Date">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnUrineRoutine()" class="btn btn-success font-normal mt-3 rounded">ADD URINE ROUTINE</button>
</div>

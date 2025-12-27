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
          <input wire:model.defer="form_n.physical_exam" type="text" class="form-control" placeholder="P/A" >
        </td>
        <td>
          <label>Quantity</label>
          <input wire:model.defer="form_n.quantity" type="text" class="form-control" placeholder="CNS" >
        </td>
        <td>
          <label>Colour</label>
          <input wire:model.defer="form_n.colour" type="text" class="form-control" placeholder="CBC" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Appearance</label>
          <input wire:model.defer="form_n.appearance" type="text" class="form-control" placeholder="ESR" >
        </td>
        <td>
          <label>Dposits</label>
          <input wire:model.defer="form_n.deposits" type="text" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>pH</label>
          <input wire:model.defer="form_n.ph" type="text" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>Specific Gravity</label>
          <input wire:model.defer="form_n.specific_gravity" type="text" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Microscopic Report File*</label>
          <input wire:model.defer="form_n.me_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>       

        <td colspan="6">
          <label>Microscopi Exam Lab Report File*</label>
          <input wire:model.defer="form_n.melr_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_n.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_n.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_n.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnUrineRoutine()" class="btn btn-success font-normal mt-3 rounded">ADD BLOOD ROUTINE</button>
</div>

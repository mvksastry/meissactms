<div>
    {{-- Be like water. --}}
  <!--Divider-->
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
    <tr>
      <th>
        Electrolytes
      </th>
    </tr>
    <tbody>
      <tr>
        <td>
          <label>Sodium</label>
          <input wire:model.defer="form_g.sodium" id="crp" type="text" value="null" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>Potassium</label>
          <input wire:model.defer="form_g.potassium" id="rft" type="text" value="null" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>Chloride</label>
          <input wire:model.defer="form_g.chloride" id="lft" type="text" value="null" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Electrolyte Report File*</label>
          <input wire:model.defer="form_g.electro_report_file" type="file" value="null" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_g.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_g.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_g.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
    <button wire:click="fnElectrolytes()" class="btn btn-success font-normal mt-3 rounded">ADD ELECTROLYTES</button>
</div>

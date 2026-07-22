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
          <label>Sodium (mEq/L)</label>
          <input wire:model.defer="form_g.sodium" id="sodium" type="text" value="null" class="form-control" placeholder="Sodium (mEq/L)" >
        </td>
        <td>
          <label>Potassium (mEq/L)</label>
          <input wire:model.defer="form_g.potassium" id="potassium" type="text" value="null" class="form-control" placeholder="Potassium (mEq/L)" >
        </td>
        <td>
          <label>Chloride (mEq/L)</label>
          <input wire:model.defer="form_g.chloride" id="chloride" type="text" value="null" class="form-control" placeholder="Chloride (mEq/L)" >
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
          <input wire:model.defer="form_g.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Comment">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_g.entered_by" id="entered_by" type="text" class="form-control" placeholder="Entered By">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_g.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Entry Date">
        </td>
      </tr>
    </tbody>
  </table>
    <button wire:click="fnElectrolytes()" class="btn btn-success font-normal mt-3 rounded">ADD ELECTROLYTES</button>
</div>

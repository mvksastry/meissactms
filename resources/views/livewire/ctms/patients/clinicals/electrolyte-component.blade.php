<div>
    {{-- Be like water. --}}
  <!--Divider-->
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
    <tr>
      <th>
        Electrolytes
      </th>
    </tr>
    <tbody>
      <tr>
        <td>
          <label>Sodium</label>
          <input wire:model.defer="form.sodium" id="crp" type="text" value="null" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>Potassium</label>
          <input wire:model.defer="form.potassium" id="rft" type="text" value="null" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>Chloride</label>
          <input wire:model.defer="form.chloride" id="lft" type="text" value="null" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Electrolyte Report File*</label>
          <input wire:model.defer="form.electro_report_file" type="file" value="null" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
</div>

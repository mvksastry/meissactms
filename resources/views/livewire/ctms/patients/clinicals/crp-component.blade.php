<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
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
          <label>CRP</label>
          <input wire:model.defer="form.crp" type="text" class="form-control" placeholder="CRP" >
        </td>
        <td colspan="5">
          <label>CRP Report File</label>
          <input wire:model.defer="form.crp_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>
      <tr>
        <td>
          <label>IL-6</label>
          <input wire:model.defer="form.il6" type="text" class="form-control" placeholder="IL-6" >
        </td>
        <td colspan="5">
          <label>IL-6 Report File*</label>
          <input wire:model.defer="form.il6_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>                               
    </tbody>
  </table>
</div>

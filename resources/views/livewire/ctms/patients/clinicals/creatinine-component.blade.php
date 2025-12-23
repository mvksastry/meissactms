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
          <input wire:model.defer="form.serum_creatinine" type="text" class="form-control" placeholder="Serum Creatinine" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Creatinine Report File</label>
          <input wire:model.defer="form.creatine_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr> 
    </tbody>
  </table>
</div>

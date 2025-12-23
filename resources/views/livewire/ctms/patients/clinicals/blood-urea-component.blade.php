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
          <label>Urea</label>
          <input wire:model.defer="form.urea" type="text" class="form-control" placeholder="Urea" >
        </td>
        <td>
          <label>Blood Urea Nitrogen</label>
          <input wire:model.defer="form.blood_urea_nitrogen" type="text" class="form-control" placeholder="Blood Urea Nitrogen" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>BU & BUN Report File*</label>
          <input wire:model.defer="form.bubun_report_file" type="file" class="form-control" placeholder="Report File" >
        </td>
      </tr>  
    </tbody>
  </table>
</div>

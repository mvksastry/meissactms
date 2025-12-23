<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
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
        <th colspan="6" align="center">Miscllineous Observations</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>General Summary</label>
          <input wire:model.defer="form.general_summary" type="text" value="null" class="form-control" placeholder="Summary">
        </td>
      </tr>                                  
    </tbody>
  </table>
</div>

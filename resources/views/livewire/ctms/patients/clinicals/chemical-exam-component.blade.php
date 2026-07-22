<div>
  {{-- Care about people's approval and you will be their prisoner. --}}
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
        <th colspan="3" align="center">Chemical Examination</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Proteins (Present/Absent)</label>
          <input wire:model.defer="form_d.proteins" type="text" class="form-control" placeholder="Proteins (Present/Absent)" >
        </td>
        <td>
          <label>Sugar (Present/Absent)</label>
          <input wire:model.defer="form_d.sugar" type="text" class="form-control" placeholder="Sugar (Present/Absent)" >
        </td>
        <td>
          <label>Ketones (Present/Absent)</label>
          <input wire:model.defer="form_d.ketones" type="text" class="form-control" placeholder="Ketones (Present/Absent)" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Procalcitonin (Present/Absent)</label>
          <input wire:model.defer="form_d.procalcitonin" type="text" class="form-control" placeholder="Procalcitonin (Present/Absent)" >
        </td>
        <td>
          <label>Bile salts (Present/Absent)</label>
          <input wire:model.defer="form_d.bile_salts" type="text" class="form-control" placeholder="Bile Salts" >
        </td>
        <td>
          <label>Bile Pigments (Present/Absent)</label>
          <input wire:model.defer="form_d.bile_pigments" type="text" class="form-control" placeholder="Bile Pigments (Present/Absent)" >
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
          <input wire:model.defer="form_d.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_d.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_d.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnChemExams()" class="btn btn-success font-normal mt-3 rounded">ADD CHEM EXAM DATA</button>
</div>

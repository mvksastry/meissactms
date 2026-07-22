<div>
    {{-- The Master doesn't talk, he acts. --}}
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
        <th colspan="6" align="center">Microscopic Examination</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Pus Cells ( /hpf)</label>
          <input wire:model.defer="form_l.pus_cells" id="oande" type="text" class="form-control" placeholder="Pus Cells ( /hpf)">
        </td>
        <td>
          <label>Epithelial Cells ( /hpf)</label>
          <input wire:model.defer="form_l.epithelial_cells" id="pr" type="text" class="form-control" placeholder="Epithelial Cells ( /hpf)">
        </td>
        <td>
          <label>RBCs ( /hpf)</label>
          <input wire:model.defer="form_l.rbcs" id="temperature" type="text" class="form-control" placeholder="RBCs ( /hpf)" >
        </td>
        <td>
          <label>Yeast Cells ( /hpf)</label>
          <input wire:model.defer="form_l.yeast_cells" id="bp_systolic" type="text" class="form-control" placeholder="Yeast Cells" >
        </td>
        <td>
          <label>Bacteria (Present/Absent)</label>
          <input wire:model.defer="form_l.bacteria" id="bp_diastolic" type="text" class="form-control" placeholder="Bacteria (Present/Absent)" >
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
          <input wire:model.defer="form_l.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Comment">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_l.entered_by" id="entered_by" type="text" class="form-control" placeholder="Entered By">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_l.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Entry Date">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnMicroscopicExam()" class="btn btn-success font-normal mt-3 rounded">ADD MICROSCOPIC OBS</button>
</div>

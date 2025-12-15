  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="3">
          <label>Entered By*</label>
          <input wire:model="form.comment_entered_by" class="form-control" value="{{ $patientPrimaryInfo->comment_entered_by }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form.entered_by" class="form-control" value="{{ $patientPrimaryInfo->entered_by }}"  type="text">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form.entry_date" class="form-control" value="{{ $patientPrimaryInfo->entry_date }}"  type="date">
         </td>
      </tr>
    </tbody>
  </table>
                     
  <button wire:click="fnSaveEditPrimaryInfo()" class="btn btn-warning font-normal mt-3 rounded">EDIT PRIMARY INFO</button>
          
  
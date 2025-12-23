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
          <input wire:model.defer="form_c.urea" type="text" class="form-control" placeholder="Urea" >
        </td>
        <td>
          <label>Blood Urea Nitrogen</label>
          <input wire:model.defer="form_c.blood_urea_nitrogen" type="text" class="form-control" placeholder="Blood Urea Nitrogen" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>BU & BUN Report File*</label>
          <input wire:model.defer="form_c.bubun_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_c.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_c.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_c.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
    <button wire:click="fnBloodUrea()" class="btn btn-success font-normal mt-3 rounded">ADD BLOOD UREA DATA</button>
</div>

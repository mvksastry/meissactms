<div>
  {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
        <th colspan="6" align="center">Blood Sugar</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Fasting</label>
          <input wire:model.defer="form_b.fasting" type="text" class="form-control" placeholder="Fasting">
        </td>
        <td>
          <label>Random</label>
          <input wire:model.defer="form_b.random" type="text" class="form-control" placeholder="Random">
        </td>
        <td>
          <label>Post-Prandial</label>
          <input wire:model.defer="form_b.post_prandial" type="text" class="form-control" placeholder="Post Prandial" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Blood Sugar Report File*</label>
          <input wire:model.defer="form_b.bs_report_file" type="file" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_b.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_b.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_b.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnBloodSugar()" class="btn btn-success font-normal mt-3 rounded">ADD BLOOD SUGAR DATA</button>
</div>

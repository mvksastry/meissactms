<div>
    {{-- Success is as dangerous as failure. --}}
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
        <th colspan="6" align="center">Liver Function and Electrolytes</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Serum Total protein (g/dL)</label>
          <input wire:model.defer="form_k.serum_total_protein" type="text" value="null" class="form-control" placeholder="Serum Total protein (g/dL)">
        </td>
        <td>
          <label>Serum Albumin (g/dL)</label>
          <input wire:model.defer="form_k.serum_albumin" type="text" value="null" class="form-control" placeholder="Serum Albumin (g/dL)">
        </td>
        <td>
          <label>Globulin (g/dL)</label>
          <input wire:model.defer="form_k.globulin" type="text" value="null" class="form-control" placeholder="Globulin (g/dL)" >
        </td>
        <td>
          <label>A/G Ratio</label>
          <input wire:model.defer="form_k.ag_ratio" type="text" value="null" class="form-control" placeholder="A/G Ratio" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Total Bilirubin (mg/dL)</label>
          <input wire:model.defer="form_k.total_bilirubin" type="text" value="null" class="form-control" placeholder="Total Bilirubin (mg/dL)" >
        </td>
        <td>
          <label>Direct Bilirubin (mg/dL)</label>
          <input wire:model.defer="form_k.direct_bilirubin" type="text" value="null" class="form-control" placeholder="Direct Bilirubin (mg/dL)" >
        </td>

        <td>
          <label>Indirect Bilirubin (mg/dL)</label>
          <input wire:model.defer="form_k.indirect_bilirubin" type="text" value="null" class="form-control" placeholder="Indirect Bilirubin (mg/dL)" >
        </td>
      </tr>
      <tr>
        <td>
          <label>S.G.O.T (U/L)</label>
          <input wire:model.defer="form_k.sgot" type="text" value="null" class="form-control" placeholder="SGOT (U/L)" >
        </td>
        <td>
          <label>S.G.P.T (U/L)</label>
          <input wire:model.defer="form_k.sgpt" type="text" value="null" class="form-control" placeholder="SGPT (U/L)" >
        </td>
        <td>
          <label>Alkaline Phosphatase (U/L)</label>
          <input wire:model.defer="form_k.alkaline_phosphatase" type="text" value="null" class="form-control" placeholder="Alkaline Phosphatase (U/L)" >
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
          <input wire:model.defer="form_k.comment_entered_by" id="comment_entered_by" type="text" class="form-control" placeholder="Comment">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_k.entered_by" id="entered_by" type="text" class="form-control" placeholder="Entered By">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_k.entry_date" id="entry_date" type="date" class="form-control" placeholder="Entry Date">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnLiverFunction()" class="btn btn-success font-normal mt-3 rounded">ADD LIVER DATA</button>
</div>

<div>
    {{-- Success is as dangerous as failure. --}}
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
        <th colspan="6" align="center">Liver Function and Electrolytes</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Serum Total protein</label>
          <input wire:model.defer="form_k.serum_total_protein" type="text" value="null" class="form-control" placeholder="Total Protein">
        </td>
        <td>
          <label>Serum Albumin</label>
          <input wire:model.defer="form_k.serum_albumin" type="text" value="null" class="form-control" placeholder="Serum Albumin">
        </td>
        <td>
          <label>Globulin</label>
          <input wire:model.defer="form_k.globulin" type="text" value="null" class="form-control" placeholder="Globulin" >
        </td>
        <td>
          <label>A/G Ratio</label>
          <input wire:model.defer="form_k.ag_ratio" type="text" value="null" class="form-control" placeholder="A/G Ratio" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Total Bilirubin</label>
          <input wire:model.defer="form_k.total_bilirubin" type="text" value="null" class="form-control" placeholder="Total Bilirubin" >
        </td>
        <td>
          <label>Direct Bilirubin</label>
          <input wire:model.defer="form_k.direct_bilirubin" type="text" value="null" class="form-control" placeholder="Dir Bilirubin" >
        </td>

        <td>
          <label>Indirect Bilirubin</label>
          <input wire:model.defer="form_k.indirect_bilirubin" type="text" value="null" class="form-control" placeholder="Ind Bilirubin" >
        </td>
      </tr>
      <tr>
        <td>
          <label>S.G.O.T</label>
          <input wire:model.defer="form_k.sgot" type="text" value="null" class="form-control" placeholder="SGOT" >
        </td>
        <td>
          <label>S.G.P.T</label>
          <input wire:model.defer="form_k.sgpt" type="text" value="null" class="form-control" placeholder="SGPT" >
        </td>
        <td>
          <label>Alkaline Phosphatase</label>
          <input wire:model.defer="form_k.alkaline_phosphatase" type="text" value="null" class="form-control" placeholder="Alkaline Phos" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Liver Report File*</label>
          <input wire:model.defer="form_k.lft_report_file" type="file" value="null" class="form-control" placeholder="Report File" >
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
          <input wire:model.defer="form_k.comment_entered_by" id="comment_entered_by" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Entered By*</label>
          <input wire:model="form_k.entered_by" id="entered_by" type="text" class="form-control" placeholder="Description">
        </td>
        <td colspan="1">
          <label>Entry Date*</label>
          <input wire:model="form_k.entry_date" id="entry_date" type="date" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
  <button wire:click="fnLiverFunction()" class="btn btn-success font-normal mt-3 rounded">ADD LIVER DATA</button>
</div>

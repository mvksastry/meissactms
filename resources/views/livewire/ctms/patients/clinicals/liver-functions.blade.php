<div>
    {{-- Success is as dangerous as failure. --}}
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
          <input wire:model.defer="form.serum_total_protein" type="text" value="null" class="form-control" placeholder="Total Protein">
        </td>
        <td>
          <label>Serum Albumin</label>
          <input wire:model.defer="form.serum_albumin" type="text" value="null" class="form-control" placeholder="Serum Albumin">
        </td>
        <td>
          <label>Globulin</label>
          <input wire:model.defer="form.globulin" type="text" value="null" class="form-control" placeholder="Globulin" >
        </td>
        <td>
          <label>A/G Ratio</label>
          <input wire:model.defer="form.ag_ratio" type="text" value="null" class="form-control" placeholder="A/G Ratio" >
        </td>
      </tr>
      <tr>
        <td>
          <label>Total Bilirubin</label>
          <input wire:model.defer="form.total_bilirubin" type="text" value="null" class="form-control" placeholder="Total Bilirubin" >
        </td>
        <td>
          <label>Direct Bilirubin</label>
          <input wire:model.defer="form.direct_bilirubin" type="text" value="null" class="form-control" placeholder="Dir Bilirubin" >
        </td>

        <td>
          <label>Indirect Bilirubin</label>
          <input wire:model.defer="form.indirect_bilirubin" type="text" value="null" class="form-control" placeholder="Ind Bilirubin" >
        </td>
      </tr>
      <tr>
        <td>
          <label>S.G.O.T</label>
          <input wire:model.defer="form.sgot" type="text" value="null" class="form-control" placeholder="SGOT" >
        </td>
        <td>
          <label>S.G.P.T</label>
          <input wire:model.defer="form.sgpt" type="text" value="null" class="form-control" placeholder="SGPT" >
        </td>
        <td>
          <label>Alkaline Phosphatase</label>
          <input wire:model.defer="form.alkaline_phosphatase" type="text" value="null" class="form-control" placeholder="Alkaline Phos" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Liver Report File*</label>
          <input wire:model.defer="form.lft_report_file" type="file" value="null" class="form-control" placeholder="Report File" >
        </td>
      </tr>
    </tbody>
  </table>
</div>

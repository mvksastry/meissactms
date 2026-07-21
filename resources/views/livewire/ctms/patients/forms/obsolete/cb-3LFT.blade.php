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
  <!--Divider-->
  <hr class="border-b-2 border-warning my-2 mx-2">
  <!--Divider-->
  <table>
    <tr>
      <th>
        Electrolytes
      </th>
    </tr>
    <tbody>
      <tr>
        <td>
          <label>Sodium</label>
          <input wire:model.defer="form.sodium" id="crp" type="text" value="null" class="form-control" placeholder="CRP" >
        </td>
        <td>
          <label>Potassium</label>
          <input wire:model.defer="form.potassium" id="rft" type="text" value="null" class="form-control" placeholder="RFT" >
        </td>
        <td>
          <label>Chloride</label>
          <input wire:model.defer="form.chloride" id="lft" type="text" value="null" class="form-control" placeholder="LFT" >
        </td>
      </tr>
      <tr>
        <td colspan="6">
          <label>Electrolyte Report File*</label>
          <input wire:model.defer="form.electro_report_file" type="file" value="null" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
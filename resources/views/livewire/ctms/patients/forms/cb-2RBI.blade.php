  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>RBC</label>
          <input wire:model.defer="form.rbc" type="text" value="null" class="form-control" placeholder="RBC">
        </td>
        <td>
          <label>HGB</label>
          <input wire:model.defer="form.hgb" type="text" value="null" class="form-control" placeholder="HGB">
        </td>
        <td>
          <label>HCT</label>
          <input wire:model.defer="form.hct" type="text" value="null" class="form-control" placeholder="HCT" >
        </td>
        <td>
          <label>MCV</label>
          <input wire:model.defer="form.mcv" type="text" value="null" class="form-control" placeholder="MCV" >
        </td>
        <td>
          <label>MCH</label>
          <input wire:model.defer="form.mch" type="text" value="null" class="form-control" placeholder="MCH" >
        </td>
        <td>
          <label>MCHC</label>
          <input wire:model.defer="form.mchc" type="text" value="null" class="form-control" placeholder="MCHC" >
        </td>
      </tr>
      <tr>
        <td>
          <label>RDW-SD</label>
          <input wire:model.defer="form.rdw_sd" type="text" value="null" class="form-control" placeholder="RDW-SD" >
        </td>
        <td>
          <label>RDW-CV</label>
          <input wire:model.defer="form.rdw_cs" type="text" value="null" class="form-control" placeholder="RDW-CV" >
        </td>
        <td>
          <label>PLT</label>
          <input wire:model.defer="form.plt" type="text" value="null" class="form-control" placeholder="PLT" >
        </td>
        <td>
          <label>PDW</label>
          <input wire:model.defer="form.pdw" type="text" value="null" class="form-control" placeholder="PDW" >
        </td>
        <td>
          <label>MPV</label>
          <input wire:model.defer="form.mpv" type="text" value="null" class="form-control" placeholder="MPV" >
        </td>
        <td>
          <label>P-LCR</label>
          <input wire:model.defer="form.plcr" type="text" value="null" class="form-control" placeholder="P-LCR" >
        </td>
      </tr>
      <tr>
        <td>
          <label>pct</label>
          <input wire:model.defer="form.pct" type="text" value="null" class="form-control" placeholder="pct" >
        </td>
        <td>
          <label>WBC</label>
          <input wire:model.defer="form.wbc" type="text" value="null" class="form-control" placeholder="WBC" >
        </td>
      </tr>

      <tr>
        <td>
          <label>Neut(Abs)</label>
          <input wire:model.defer="form.neutrophils_abs" type="text" value="null" class="form-control" placeholder="Neut(Abs)" >
        </td>
        <td>
          <label>Neut(%)</label>
          <input wire:model.defer="form.neutrophils_percent" type="text" value="null" class="form-control" placeholder="Neut(%)" >
        </td>
        <td>
          <label>Lymph(Abs)</label>
          <input wire:model.defer="form.lymph_abs" type="text" value="null" class="form-control" placeholder="Lymph(Abs)" >
        </td>
        <td>
          <label>Lymph(%)</label>
          <input wire:model.defer="form.lymph_percent" type="text" value="null" class="form-control" placeholder="Lymph(%)" >
        </td>
        <td>
          <label>Mono(Abs)</label>
          <input wire:model.defer="form.mono_abs" type="text" value="null" class="form-control" placeholder="Mono(Abs)" >
        </td>
        <td>
          <label>Mono(%)</label>
          <input wire:model.defer="form.mono_percent" type="text" value="null" class="form-control" placeholder="Mono(%)" >
        </td>
      </tr>

      <tr>
        <td>
          <label>EO(Abs)</label>
          <input wire:model.defer="form.eo_abs" type="text" value="null" class="form-control" placeholder="EO(Abs)" >
        </td>

        <td>
          <label>EO(%)</label>
          <input wire:model.defer="form.eo_percent" type="text" value="null" class="form-control" placeholder="EO(%)" >
        </td>
        <td>
          <label>BASO(Abs)</label>
          <input wire:model.defer="form.baso_abs" type="text" value="null" class="form-control" placeholder="BASO(Abs)" >
        </td>
        <td>
          <label>BASO(%)</label>
          <input wire:model.defer="form.baso_percent" type="text" value="null" class="form-control" placeholder="BASO(%)" >
        </td>
        <td>
          <label>IG(Abs)</label>
          <input wire:model.defer="form.ig_abs" type="text" value="null" class="form-control" placeholder="Ig(Abs)" >
        </td>
        <td>
          <label>IG(%)</label>
          <input wire:model.defer="form.ig_percent" type="text" value="null" class="form-control" placeholder="Ig(%)" >
        </td>
      </tr>

      <tr>
        <td colspan="6">
          <label>Summary & Comments*</label>
          <input wire:model.defer="form.summary_comments" type="text" value="null" class="form-control" placeholder="Report File" >
        </td>
      </tr> 

      <tr>
        <td colspan="6">
          <label>Laboratory Report File*</label>
          <input wire:model.defer="form.lab_report_file" type="text" value="null" class="form-control" placeholder="Report File" >
        </td>
      </tr>                                    
    </tbody>
  </table>
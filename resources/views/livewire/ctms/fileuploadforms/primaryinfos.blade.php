<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="4" align="center"></th>
    </tr>
  </thead>
  <tbody> 
      <tr>
          <td>
              <label>Primary Infos</label>
              <input wire:model.defer="primaryinfos" type="file"  class="form-control" placeholder="Report File" >  
              </br>@error('primaryinfos') <span class="error">{{ $message }}</span> @enderror                                 
          </td>
      </tr>
      <tr>
          <td>
              <button wire:click="fnUploadPrimaryInfos()" class="btn btn-info font-normal mt-3 rounded">UPLOAD PRIMARY iNFO</button>
          </td>
      </tr> 
  </tbody>
</table>
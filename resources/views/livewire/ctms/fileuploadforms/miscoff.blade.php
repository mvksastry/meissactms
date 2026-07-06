<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="2" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="2">
          <label>Misc / Official - 1</label>
          <input wire:model.defer="miscoff1" type="file" class="form-control" placeholder="Report File" >
          </br>@error('miscoff1') <span class="error">{{ $message }}</span> @enderror 
        </td>
      </tr>
      <tr>
      
        <td colspan="2">
          <label>Misc / Official - 2</label>
          <input wire:model.defer="miscoff2" type="file" class="form-control" placeholder="Report File" >
          </br>@error('miscoff2') <span class="error">{{ $message }}</span> @enderror 
        </td>
      
      </tr>
    <tr>
        <td>
            <button wire:click="fnUploadMiscFiles()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD MISC INFOS</button>
        </td>
    </tr> 
    </tbody>
</table>
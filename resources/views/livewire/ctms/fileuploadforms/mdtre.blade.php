<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="3" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>M & DTR Files</label>
        <input wire:model.defer="mdtre" type="file" class="form-control" placeholder="Report File" >
        </br>@error('mdtre') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr> 
      <tr>
          <td>
              <button wire:click="fnUploadMDTREInfo()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD MDTRE INFO</button>
          </td>
      </tr>                                   
  </tbody>
</table>
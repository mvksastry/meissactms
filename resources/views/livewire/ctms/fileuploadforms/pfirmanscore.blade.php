<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="3" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>Pfirman's Score</label>
        <input wire:model.defer="pfirmanscore" type="file" class="form-control" placeholder="Report File" >
        </br>@error('pfirmanscore') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr> 
      <tr>
          <td>
              <button wire:click="fnUploadPfirmanScore()" class="btn btn-warning font-normal mt-3 rounded">EDIT MDTRE INFO</button>
          </td>
      </tr>                                   
  </tbody>
</table>
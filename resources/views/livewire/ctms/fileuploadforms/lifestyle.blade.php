<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>Life Style</label>
        <input wire:model.defer="lifestyle" type="file" class="form-control" placeholder="Report File" >
        </br>@error('lifestyle') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
      <tr>
          <td>
              <button wire:click="fnUploadlifestyleInfos()" class="btn btn-info font-normal mt-3 rounded">UPLOAD LIFE STYLE INFO</button>
          </td>
      </tr> 
  </tbody>
</table>
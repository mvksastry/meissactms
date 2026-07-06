<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="3" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>Visual & Analog Score File</label>
        <input wire:model.defer="form_w.vascore" type="file" class="form-control" placeholder="Report File" >
        </br>@error('vascore') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>  
      <tr>
          <td>
              <button wire:click="fnUploadVAScore()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD V&A SCORE</button>
          </td>
      </tr>                                  
  </tbody>
</table>
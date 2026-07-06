<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="3" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>RMQ Score File</label>
        <input wire:model.defer="form_u.rmqscore" type="file" class="form-control" placeholder="Report File" >
        </br>@error('rmqscore') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>  
      <tr>
          <td>
              <button wire:click="fnUploadRMQScore()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD RMQ SCORE</button>
            </td>
      </tr>                                  
  </tbody>
</table>
<table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>
          <label>Sensory Exam</label>
          <input wire:model.defer="form_v.sensoryexam" type="file" class="form-control" placeholder="Report File" >
          </br>@error('sensoryexam') <span class="error">{{ $message }}</span> @enderror 
        </td>
      </tr>  
        <tr>
            <td>
                <button wire:click="fnUploadSensoryExams()" class="btn btn-warning font-normal mt-3 rounded">UPLOAD SENSORY EXAMS</button>
            </td>
        </tr>                                  
    </tbody>
  </table>
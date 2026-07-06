<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="5" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td>
        <label>Clinical Files</label>                                      
      </td>
    </tr>
    <tr>
      <td>
        <label>Blood Routine</label>
        <input wire:model.defer="form_x.blood_routine" type="file" class="form-control" 
        id="upload{{ $iter1 }}" placeholder="Report File" >
        </br>@error('blood_routine') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
    <tr>
      <td>
        <label>Blood Sugar</label>
        <input wire:model.defer="form_d.blood_sugar" type="file" class="form-control" placeholder="Report File" >
        </br>@error('blood_sugar') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
    <tr>
      <td>
        <label>Blood Urea</label>
        <input wire:model.defer="form_e.blood_urea" type="file" class="form-control" placeholder="Report File" >
        </br>@error('bllod_urea') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
    <tr>
      <td>
        <label>Chemical Examinations</label>
        <input wire:model.defer="form_f.chem_exams" type="file" class="form-control" placeholder="Report File" >
        </br>@error('chem_exams') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
    <tr>
      <td>
        <label>Creatinine</label>
        <input wire:model.defer="form_g.creatinine" type="file" class="form-control" placeholder="Report File" >
        </br>@error('creatinine') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
    <tr>
      <td>
        <label>CRP</label>
        <input wire:model.defer="form_h.crp" type="file" class="form-control" placeholder="Report File" >
        </br>@error('crp') <span class="error">{{ $message }}</span> @enderror 
      </td>
    </tr>
    <tr>
      <td>
        <label>Electrolytes</label>
        <input wire:model.defer="form_i.electrolytes" type="file" class="form-control" placeholder="Report File" >
        </br>@error('electrolytes') <span class="error">{{ $message }}</span> @enderror 
      </td>  
    </tr>
    <tr>
      <td>
        <label>IL6</label>
        <input wire:model.defer="form_j.il6" type="file" class="form-control" placeholder="Report File" >
        </br>@error('il6') <span class="error">{{ $message }}</span> @enderror 
      </td> 
    </tr>
    <tr>
      <td>
        <label>Laboratory Examinations</label>
        <input wire:model.defer="form_k.lab_exams" type="file" class="form-control" placeholder="Report File" >
        </br>@error('lab_exams') <span class="error">{{ $message }}</span> @enderror 
      </td>   
    </tr>
    <tr>
      <td>
        <label>Liver Function Tests</label>
        <input wire:model.defer="form_l.liver_function" type="file" class="form-control" placeholder="Report File" >
        </br>@error('liver_function') <span class="error">{{ $message }}</span> @enderror 
      </td> 
    </tr>
    <tr>
      <td>
        <label>Microscopic Investigations</label>
        <input wire:model.defer="form_m.microscopic_exam" type="file" class="form-control" placeholder="Report File" >
        </br>@error('microscopic_exam') <span class="error">{{ $message }}</span> @enderror 
      </td>  
    </tr>
    <tr>
      <td>
        <label>Renal Function Tests</label>
        <input wire:model.defer="form_p.renal_function" type="file" class="form-control" placeholder="Report File" >
        </br>@error('renal_function') <span class="error">{{ $message }}</span> @enderror 
      </td>   
    </tr>
    <tr>
      <td>
        <label>Urine Routine Tests</label>
        <input wire:model.defer="form_q.urine_routine" type="file" class="form-control" placeholder="Report File" >
        </br>@error('urine_routine') <span class="error">{{ $message }}</span> @enderror 
      </td> 
    </tr>
      <tr>
          <td>
              <button wire:click="fnUploadClinicalReports()" class="btn btn-success font-normal mt-3 rounded">Upload Reports</button>
          </td>
      </tr> 
  </tbody>
</table>
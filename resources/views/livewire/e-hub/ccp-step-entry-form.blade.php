<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="5"> Progress </th>
    </tr>
  </thead>
  <tbody> 
    
  </tbody>
</table>


<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="5"> BATCH PROCESSING RECORD FOR PREPARING AUTOLOGOUS PLATELET LYSATE (AuPL) AND COMPLETE MEDIUM </th>
    </tr>
  </thead>
  <tbody> 		
    <tr>
      <td> Issue Date: {{ $this->ccps_steps->issue_date ?? 'N/A' }}</td>
    
      <td> Prepared By: {{ $this->ccps_steps->prepared_by ?? 'N/A' }}</td>
    
      <td> Reviewed By: {{ $this->ccps_steps->reviewed_by ?? 'N/A' }}</td>
    
      <td> Version No: {{ $this->ccps_steps->version_no ?? 'N/A' }}</td> 
    </tr>
    <tr>
      <td> Amendment No: {{ $this->ccps_steps->amendment_no ?? 'N/A' }}</td>
    
      <td> Amendment Date: {{ $this->ccps_steps->amendement_date ?? 'N/A' }}</td>
    
      <td> Created At: {{ $this->ccps_steps->created_at ?? 'N/A' }}</td>
    
      <td> Updated At: {{ $this->ccps_steps->updated_at ?? 'N/A' }}</td> 
    </tr>

    <tr>
      <td class="bg-warning" colspan="5"> Step {{ $this->ccps_steps->bpr_chondrocyte_step_id ?? 'N/A' }}: {{ $this->ccps_steps->description ?? 'N/A' }}</td>
    </tr>

    <tr>
      <td colspan="5"> Step Expectations: </td>
    </tr>

    <tr>  
      <td> 
        <label>Enter Detail</label>
        <input type="text" wire:model="enter_details" class="form-control" placeholder="Enter ...">
        @error('enter_details') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>      
      <td> 
        <label>Step Completed</label>
        <input type="text" wire:model="step_completed" class="form-control" placeholder="Enter ...">
        @error('step_completed') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
    
      <td> 
        <div class="form-group">
          <div class="form-check">
            
            <label>Date & Time (Auto Enter)</label>
          </br>
            <input wire:model="date_time" class="form-check-input mt-2 ml-2" type="checkbox">
          </div>
        </div>
        @error('date_time') <span class="error text-danger">{{ $message }}</span> @enderror
        
      </td>
    
      <td> 
        <label>Done/Executed By </label> 
        <input type="text" wire:model="done_executed_by" class="form-control" placeholder="Enter ...">
        @error('done_executed_by') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>

      <td> 
        <label>Checked By </label>
        <input type="text" wire:model="checked_by" class="form-control" placeholder="Enter ...">
        @error('checked_by') <span class="error text-danger">{{ $message }}</span> @enderror
      </td> 
    </tr>
    <tr>
      <td colspan="5"> 
        <label>Observations </label>
        <input type="text" wire:model="observations" class="form-control" placeholder="Enter ...">
        @error('observations') <span class="error text-danger">{{ $message }}</span> @enderror
      </td> 
    </tr>
    <tr>
      <td colspan="5"> 
        <label>Deviations, If any,  </label>
        <input type="text" wire:model="deviations" class="form-control" placeholder="Enter ...">
        @error('deviations') <span class="error text-danger">{{ $message }}</span> @enderror
      </td> 
    </tr>

  </tbody>
</table>
@if($showPassageForm)
  @include('livewire.e-hub.cell-passages')
@endif
<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
      <tr>
        <th> Enter Data </th>
      </tr>
  </thead>
  <tbody> 		
    <tr>
      <td>                         
        <div class="form-check">
          <button wire:click="fnOpenPassageForm()" 
          class="btn btn-success text-white font-normal mt-3 rounded">ENTER PASSAGE INFO</button>
          
        </div>
      </td>
    </tr>
    <tr>
      <td>                         
        <div class="form-check">
          <input wire:model="all_verified" class="form-check-input" type="checkbox">
          <label class="form-check-label">All Verified</label>
          @error('all_verified') <span class="error text-danger">{{ $message }}</span> @enderror  
        </div>
      </td>
    </tr>
    <tr>
      <td>                         
        <div class="form-check">
          <input wire:model="post_data" class="form-check-input" type="checkbox">
          <label class="form-check-label">Completed the step</label>
            @error('post_data') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
      </td>
    </tr>           
    <tr>
      <td>
        <button wire:click="fnCreateChondrocyteProductionStepRecord()" class="btn btn-success text-white font-normal mt-3 rounded">ENTER STEP DATA</button>
      </td>
    </tr>
  </tbody>
</table>

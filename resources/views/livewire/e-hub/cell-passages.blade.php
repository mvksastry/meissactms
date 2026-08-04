<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="5"> Cell Passages - All Fields Mandatory </th>
    </tr>
  </thead>
  <tbody> 		
    <tr>
      <td class="bg-warning" colspan="5"> </td>
    </tr>

    <tr>
      <td> 
        <label>Cell Line ID</label>
        <input type="text" wire:model="cell_line_id" class="form-control" placeholder="Enter ...">
        @error('cell_line_id') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Cell Line Origin</label>
        <input type="text" wire:model="cell_line_origin" class="form-control" placeholder="Enter ...">
        @error('cell_line_origin') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Cell Line Origin Comment</label>
        <input type="text" wire:model="cell_line_origin_comment" class="form-control" placeholder="Enter ...">
        @error('cell_line_origin_comment') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
    </tr>

    <tr>  
      <td> 
        <label>Passage Num</label>
        <input type="number" wire:model="passage_number" class="form-control" placeholder="Enter ...">
        @error('passage_number') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Passage Date</label>
        <input type="date" wire:model="passage_date" class="form-control" placeholder="Enter ...">
        @error('passage_date') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Passage Day</label>
        <input type="number" wire:model="passage_day" class="form-control" placeholder="Enter ...">
        @error('passage_day') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
    </tr>

    <tr>
      <td> 
        <div class="form-group">
          <div class="form-check">
            <input wire:model.live="type" value="plate" class="form-check-input" type="radio" name="radio1">
            <label class="form-check-label">Plate</label>
            @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
      </td>
      <td>
        <div>
          <div class="form-check">
            <input wire:model.live="type" value="flask" class="form-check-input" type="radio" name="radio1">
            <label class="form-check-label">Flask</label>
            @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
      </td>
    </tr>

    @if($showPlateRow)
    <tr>
      <td> 
        <label>Plate Type (Number of Wells)</label>
        <input type="text" wire:model="plate_type" class="form-control" placeholder="Enter ...">
        @error('plate_type') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Transfer To Plate Date</label>
        <input type="date" wire:model="transfer_plate_date" class="form-control" placeholder="Enter ...">
        @error('transfer_plate_date') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Transfer To Plate Day</label>
        <input type="number" wire:model="transfer_plate_day" class="form-control" placeholder="Enter ...">
        @error('transfer_plate_day') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
    </tr>
    @endif
    
    @if($showFlaskRow)
    <tr>
      <td> 
        <label>Flask Type (Flask Area Number)</label>
        <input type="text" wire:model="flask_type" class="form-control" placeholder="Enter ...">
        @error('flask_type') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Transfer To Flask Date</label>
        <input type="date" wire:model="transfer_falsk_date" class="form-control" placeholder="Enter ...">
        @error('transfer_falsk_date') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Transfer To Flask Day</label>
        <input type="number" wire:model="transfer_flask_day" class="form-control" placeholder="Enter ...">
        @error('transfer_flask_day') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
    </tr>
    @endif

    <tr>
      <td> 
        <label>Cell Count</label>
        <input type="number" wire:model="cell_count" class="form-control" placeholder="Enter ...">
        @error('cell_count') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Status</label>
        <input type="text" wire:model="status" class="form-control" placeholder="Enter ...">
        @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
      <td> 
        <label>Comment</label>
        <input type="number" wire:model="comments" class="form-control" placeholder="Enter ...">
        @error('comments') <span class="error text-danger">{{ $message }}</span> @enderror
      </td>
    </tr>
  </tbody>
</table>
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
          <label class="form-check-label">Completed the Passage</label>
            @error('post_data') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
      </td>
    </tr>           
    <tr>
      <td>
        <button wire:click="fnPostPassagRecord()" class="btn btn-success text-white font-normal mt-3 rounded">ENTER PASSAGE DATA</button>
      </td>
    </tr>
  </tbody>
</table>


<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="4" align="center"></th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td colspan="1">
        <label>In-Charge</label>
          <select wire:model="form.incharge_id" class="form-control">
          <option value="-1">Select</option>
            @foreach($users as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
          </select>
          @error('form.incharge_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>

      <td colspan="1">
        <label>Leader</label>
          <select wire:model="form.leader_id" class="form-control">
          <option value="-1">Select</option>
            @foreach($users as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
          </select>
          @error('form.leader_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td colspan="1">
        <label>Patient (Right Now inactive)</label>
          <select wire:model="form.patient_id" class="form-control">
          <option value="-1">Select</option>
           
            <option value="0" selected>Open</option>
          
          </select>
          @error('form.patient_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label class="text-info">Code</label>
          <select wire:model="form.code" class="form-control">
          <option value="-1">Select</option>
            <option value="gen">General</option>
            <option value="admin">Administrative</option>
            <option value="mfg">Manufacturing</option>
            <option value="qc">Quality Control</option>
            <option value="qa">Quality Assurance</option>
          </select>
          @error('form.code')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
    </tr>
    
    <tr>
      <td colspan="4"> 
        <label>Activity Information</label>
      </td>
    </tr>

    <tr>

      <td colspan="4">
        <label class="text-info">Description*</label>
        <input placeholder="Description" class="form-control" wire:model.defer="form.description">
          @error('form.description')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>   
    </tr>

    <tr>
      <td>
        <label>Approval Reference</label>
        </br>
        <input class="form-control" id="approvedDate" wire:model="form.approval_ref" type="text">
          @error('form.approval_ref')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>Approval Date</label>
          <input class="form-control" id="approvedDate" wire:model="form.date_approved" type="date">
          @error('form.date_approved')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>Start Date</label>
          <input class="form-control" id="approvedDate" wire:model="form.start_date" type="date">
          @error('form.start_date')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      
      <td>
        <label>End date</label>
        <input class="form-control" id="approvedDate" wire:model="form.end_date" type="date">
          @error('form.end_date')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
    </tr>

    <tr>
      <td colspan="4"> 
        <label>Budget Information</label>
      </td>
    </tr>

    <tr>
      <td>
        <label>Total Budget</label>
          <input class="form-control" id="approvedDate" wire:model="form.budget_total" type="number">
          @error('form.budget_total')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>Equipment</label>
        <input class="form-control" id="approvedDate" wire:model="form.budget_equipment" type="number">
          @error('form.budget_equipment')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>Consumables</label>
          <input class="form-control" id="approvedDate" wire:model="form.budget_consumable" type="number">
          @error('form.budget_consumable')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      
      <td>
        <label>Contingency</label>
        <input class="form-control" id="approvedDate" wire:model="form.budget_contigency" type="number">
          @error('form.budget_contigency')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
    </tr>

    <tr>
      <td colspan="4"> 
        <label>Activity Files</label>
      </td>
    </tr>
    
    <tr>
      <td colspan="2">
        <label  for="username">Summary File</label>
        <input size="15" class="form-control" id="validTill" wire:model="form.activity_file" type="file">
        </br>
          @error('form.activity_file')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td colspan="2">
        <label>Scanction File</label>
        <input size="15" class="form-control" id="validTill" wire:model="form.sanction_file" type="file">
          @error('form.sanction_file')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
    </tr>
    
    <tr>
      <td colspan="4">
        <label>Notes, If any</label>
        <input type="text" placeholder="Sample remarks, if any" class="form-control" wire:model.defer="form.notes">
          @error('form.notes')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
    </tr>
    <tr>
      <td colspan="4">
      </td>
    </tr>
    <tr>
      <td colspan="4">
          @hasanyrole('ctms_incharge|director')
          <button wire:click="fnPostCreateActivityInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD ACTIVITY</button>
          @endhasanyrole
      </td>
    </tr>
  </tbody>    
</table>	
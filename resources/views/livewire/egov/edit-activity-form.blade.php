<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th colspan="4" align="center">Edit CTMS Activity ID: {{ $ctms_activity_selected }}</th>
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
        <label>Link To Patient</label>
          <select wire:model.live="form.patient_uuid" disabled class="form-control">
          <option value="-1">Select</option>
           @foreach($patients as $key => $value)
            <option value="{{ $key }}" selected>{{ $value }}</option>
          @endforeach
          </select>
          @error('form.patient_id')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label class="text-info">Code</label>
          <select wire:model="form.code" disabled class="form-control">
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
    @if($enrolmsg)
    <tr>
      <td>
        <label>Patien with Id {{ $patient_uuid }} is Enrolled</label>
      </td>
    </tr>
    @endif
    <tr>
      <td colspan="4"> 
        <label>Activity Information</label>
      </td>
    </tr>

    <tr>

      <td colspan="4">
        <label class="text-info">Description*</label>
        <input placeholder="Description" class="form-control" disabled wire:model="form.description">
          @error('form.description')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>   
    </tr>

    <tr>
      <td>
        <label>Approval Reference</label>
        </br>
        <input class="form-control" id="approvedDate" disabled wire:model="form.approval_ref" type="text">
          @error('form.approval_ref')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>Approval Date</label>
          <input class="form-control" id="approvedDate" disabled wire:model="form.date_approved" type="date">
          @error('form.date_approved')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>Start Date</label>
          <input class="form-control" id="approvedDate" disabled wire:model="form.start_date" type="date">
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
        <label>Linked Manufacturing Information</label>
      </td>
    </tr>

    <tr>
      <td>
        <label>Master Batch Recod Id</label>
          <input class="form-control" id="approvedDate" disabled wire:model="form.mbr_id" type="number">
          @error('form.budget_total')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>

      <td>
        <label>Chondrocyte Production ID</label>
        <input class="form-control" id="approvedDate" disabled wire:model="form.chondcyte_production_id" type="number">
          @error('form.budget_equipment')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>AuPL Meidia Production Id</label>
          <input class="form-control" id="approvedDate"disabled wire:model="form.auplmed_production_id" type="number">
          @error('form.budget_consumable')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
    </tr>
    <tr>
      
      <td>
        <label>MFR Status</label>
        <input class="form-control" id="approvedDate" disabled wire:model="form.mfr_status" type="number">
          @error('form.mfr_status')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>MFR Decision Date</label>
        <input class="form-control" id="approvedDate" disabled wire:model="form.mfr_decision_date" type="number">
          @error('form.mfr_decision_date')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </td>
      <td>
        <label>MFR Auth By</label>
        <input class="form-control" id="approvedDate" disabled wire:model="form.mfr_auth_by" type="number">
          @error('form.mfr_auth_by')
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
    <tr>
    </tr>
    <tr>
      <td colspan="2">
          @hasanyrole('ctms_incharge|director')
          <button wire:click="fnPostEditActivityInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD ACTIVITY</button>
          @endhasanyrole
      </td>
      <td colspan="3">
          @hasanyrole('ctms_incharge|director')
          <button wire:click="fnCancelEditInfo()" class="btn btn-warning text-white font-normal mt-3 rounded">CANCEL EDIT</button>
          @endhasanyrole
      </td>
    </tr>
  </tbody>    
</table>	
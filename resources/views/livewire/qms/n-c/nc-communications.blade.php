<div>
  <div class="bg-info disabled color-palette"><span class="mx-3">Communications</span></div>
  
  <?php $op2 = $nc_communs->isEmpty(); //dd($op2); ?>
  @if(!$op2 )
    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
            <th>Message Type</th>
            <th>Message</th>
            <th>Entered By</th>
            <th>Entered Role</th>
            <th>Visible To</th>
            <th>Time Stamps</th>                     
        </tr>
      </thead>
      <tbody> 
        @foreach($nc_communs as $row)
          <tr>
              <td>{{ ucfirst($row->message_type) }}</td>
              <td>{{ $row->message }}</td>
              <td>{{ $row->entered_by }}</td>
              <td>{{ ucfirst($row->entered_role) }}</td>
              <td>{{ ucfirst($row->visible_to) }}</td>
              <td>Created At: {{ $row->created_at }} </br> Updated At: {{ $row->updated_at}}</td>
          </tr>  
        @endforeach                                  
      </tbody>
    </table>
  @else
    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <tbody>
        <tr>
          <td>
            <code>Communications NOT Found</code>
          </td>
        </tr>
      </tbody>
    </table>
  @endif

  New Communication

 </br>
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <tbody>
      <tr>
          <td colspan="4">
          <code>Enter New Communication Detail for Nc ID: {{ $nc_id }}</code>
          </td>
      </tr>
      <tr>
        <td>
            <div class="">
              <label for="">Message Type</label>
              <select class="custom-select rounded-0" wire:model="ncComs.message_type" id="exampleSelectRounded0">
                <option value="-1">Select</option>
                <option value="first_reply">First Reply</option>
                <option value="follow-up">Follow-up</option>
                <option value="clarification">clarification</option>
              </select>
              @error('category')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>        
        </td>
        <td>
          <label>Posted By*</label>
          <input wire:model="ncComs.entered_by" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
        </td>
        <td>
          <div class="">
              <label for="">Visible To</label>
              <select class="custom-select rounded-0" wire:model="ncComs.visible_to" id="exampleSelectRounded0">
                <option value="-1">Select</option>
                <option value="qa">QA</option>
                <option value="qc">QC</option>
                <option value="all">ALL</option>
              </select>
              @error('ncComs.visible_to')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div> 
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <label>Message*</label>
          <input wire:model="ncComs.message" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
        </td>
      </tr>
      <tr>
        <td width="25%">
          <button wire:click="fnNCCommunications()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Post Communication</button>
        </td>
      </tr>
    </tbody>
  </table>
 
</div>

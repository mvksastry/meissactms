<div>
  Communications
  <?php $op2 = $nc_communs->isEmpty(); //dd($op2); ?>
  @if(!$op2 )
    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
            <th>message_type</th>
            <th>message</th>
            <th>entered_by</th>
            <th>entered-role</th>
            <th>visible_to</th>
            <th>created_at</th> 
            <th>updated_at</th>                      
        </tr>
      </thead>
      <tbody> 
        @foreach($nc_communs as $row)
          <tr>
              <td>{{ $row->message_type }}</td>
              <td>{{ $row->message }}</td>
              <td>{{ $row->entered_by }}</td>
              <td>{{ $row->entered-role }}</td>
              <td>{{ $row->visible_to }}</td>
              <td>{{ $row->created_at }}</td>
              <td>{{ $row->updated_at}}</td>
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
              <select class="custom-select rounded-0" name="category_id" id="exampleSelectRounded0">
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
          <input wire:model="ncComs.posted_by" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
        </td>
        <td>
          <label>Visible To*</label>
          <input wire:model="ncComs.visible_to" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Visible To">
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <label>Message*</label>
          <input wire:model="ncComs.msg_author" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
        </td>
      </tr>
      <tr>
        <td width="25%">
          <button wire:click="fnAckNCevent()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Post Communication</button>
        </td>
      </tr>
    </tbody>
  </table>
 
</div>

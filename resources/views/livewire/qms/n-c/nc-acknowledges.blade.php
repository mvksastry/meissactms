<div>
    {{-- Stop trying to control. --}}
    <div class="bg-success disabled color-palette"><span class="mx-3">Acknowledgements</span></div>
        
        <?php $op1 = $nc_acks->isEmpty(); //dd($op1);?>
        @if(!$op1)
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                <tr>
                    <th>Ack By</th>
                    <th>Remarks</th>
                    <th>Role </th>
                    <th>Time Stamps</th>                 
                </tr>
                </thead>
                <tbody> 
                @foreach($nc_acks as $row)
                    <tr>
                        <td>{{ ucfirst($row->ack_by) }}</td>
                        <td>{{ ucfirst($row->remarks) }}</td>                        
                        <td>{{ ucfirst($row->role_entered) }}</td>
                        <td>Created At: {{ $row->created_at }} </br> Updated At: {{ $row->updated_at }}</td>
                    </tr>  
                @endforeach                                  
                </tbody>
            </table>
        @else
            </br>
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <tbody>
                <tr>
                    <td colspan="4">
                    <code>No Acknowledgements Found, Enter Ack</code>
                    </td>
                </tr>
                    <tr>
                    <td>
                        <label>Ack By*</label>
                        <input wire:model="ncAck.ack_by" id="aadhar_id" type="text" value="{{ Auth::user()->name }}" class="form-control" placeholder="Ack by">
                    </td>
                    <td>
                        <label>Remarks*</label>
                        <input wire:model="ncAck.remarks" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Remarks">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    </tr>
                    <tr>
                    <td width="25%">
                        <button wire:click="fnAckNCevent()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Ack NC</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        @endif
</div>

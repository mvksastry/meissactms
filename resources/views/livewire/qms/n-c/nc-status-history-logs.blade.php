<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="bg-gray-dark disabled color-palette"><span class="mx-3">Status History</span></div>
            <div class="row">
              
              
              <?php $op4 = $nc_history->isEmpty(); //dd($op3);?>
              @if(!$op4)
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                      <th>from_status</th>
                      <th>to_status</th>
                      <th>changed_by</th>
                      <th>change_reason</th>
                      <th>Time Stamps</th>                   
                  </tr>
                </thead>
                <tbody> 
                  @foreach($nc_history as $row)
                    <tr>
                        <td>{{ $row->from_status }}</td>
                        <td>{{ $row->to_status }}</td>
                        <td>{{ $row->changed_by }}</td>
                        <td>{{ $row->change_reason }}</td>
                        <td>Created At: {{ $row->created_at }}</br> Updated At:{{ $row->updated_at }}</td>
                    </tr>  
                  @endforeach                                  
                </tbody>
              </table>
              @else
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>
                        <code>NC Status History Not Found</code>
                      </td>
                    </tr>
                  </tbody>
                </table>
              @endif
            </div>
</div>

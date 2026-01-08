<div>
    {{-- The best athlete wants his opponent at his best. --}}
            <div class="row">
              Audit Logs
              <?php $op5 = $nc_auditLogs->isEmpty(); //dd($op3);?>
              @if(!$op5)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>record_type</th>
                        <th>action</th>
                        <th>old_value</th>
                        <th width="60%">new_value</th>
                        <th>Time Stamps</th>                    
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($nc_auditLogs as $row)
                      <tr>
                          <td>{{ $row->record_type }}</td>
                          <td>{{ $row->action }}</td>
                          <td>{{ $row->old_value }}</td>
                          <td>{{ $row->new_value }}</td>
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
                        <code>Audit Logs Not Found</code>
                      </td>
                    </tr>
                  </tbody>
                </table>
              @endif
            </div>
</div>

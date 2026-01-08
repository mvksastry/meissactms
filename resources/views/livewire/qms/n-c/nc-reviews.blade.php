<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
            <div class="row">
              Reviews
              <?php $op3 = $nc_review->isEmpty(); //dd($op3);?>
              @if( !$op3 )
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>review_stage</th>
                        <th>summary</th>
                        <th>capa_required</th>
                        <th>reviewed_by </br> reviewed_at</th>
                        <th>locked </br> locked_by </br> locked_on</th> 
                        <th>created_at</th>  
                        <th>Updated_at</th>                    
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($nc_review as $row)
                      <tr>
                          <td>{{ $row->review_stage }}</td>
                          <td>{{ $row->summary }}</td>
                          <td>{{ $row->capa_required }}</td>
                          <td>{{ $row->reviewed_by }} </br> {{ $row->reviewed_at }}</td>
                          <td>{{ $row->locked }}</br>{{ $row->locked_by }}</br>{{ $row->locked_on }}</td>
                          <td>{{ $row->created_at }}</td>
                          <td>{{ $row->Updated_at }}</td>
                      </tr>  
                    @endforeach                                  
                  </tbody>
                </table>
              @else
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>
                        <code>Reviews NOT Found</code>
                      </td>
                    </tr>
                  </tbody>
                </table>
              @endif
            </div>
</div>

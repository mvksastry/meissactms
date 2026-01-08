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
</div>


@if(count($passageInfos) > 0)
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <th>Cell Line Id</th>
      <th>Cell Line Origin</th>
      <th>CLO Comment</th>
      <th>Passage Number</th>
      <th>Passage Date</th>
      <th>Passage Day</th>
      <th>Type</th>
      <th>Transferred Day</th>
      <th>Transferred Date</th>
      <th>cell_count</th>
      <th>comments</th>
      <th>status</th>
      <th>entered_by</th>
      <th>checked_by</th>
      <th>created_at / </br> updated_at</th>
    </thead>
  <tbody> 
    @foreach($passageInfos as $row)
      <tr>
        <td>
        {{ $row->cell_line_id }}
        </td>
        <td>
        {{ $row->cell_line_origin }}
        </td>
        <td>
        {{ $row->cell_line_origin_comment }}
        </td>
        <td>
        {{ $row->passage_number }}
        </td>
        <td>
        {{ $row->passage_date }}
        </td>
        <td>
        {{ $row->passage_day }}
        </td>
        <td>
        {{ $row->type }}
        </td>
        <td>
        {{ $row->transfer_day }}
        </td>
        <td>
        {{ $row->transfer_date }}
        </td>
        <td>
        {{ $row->cell_count }}
        </td>
        <td>
        {{ $row->comments }}
        </td>
        <td>
        {{ $row->status }}
        </td>
        <td>
        {{ $row->entered_by }}
        </td>

        <td>
        {{ $row->checked_by }}
        </td>

        <td>
        {{ $row->created_at }} / </br> {{ $row->updated_at }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@else
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <th>No Passage Infor for Display</th>
    </thead>
    <tbody> 
    </tbody>
</table>
@endif
<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th> Step No </th>
      <th> Date Time </th>
      <th> Description </th>
      <th> Completed </th>
      <th> Done By </th>
      <th> Checked By </th>
      <th> Observations </th>
      <th> Deviations </th>
    </tr>
  </thead>
  <tbody> 
    @foreach($res as $x)
      <tr>
        <td>
        {{ $x['step_no'] }}
        </td>
        <td>
        {{ $x['date_time'] }}
        </td>
        <td>
        {{ $x['description'] }}
        </td>
        <td>
        {{ $x['step_completed'] }}
        </td>
        <td>
        {{ $x['done_executed_by'] }}
        </td>
        <td>
        {{ $x['checked_by'] }}
        </td>
        <td>
        {{ $x['observations'] }}
        </td>
        <td>
        {{ $x['deviations'] }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
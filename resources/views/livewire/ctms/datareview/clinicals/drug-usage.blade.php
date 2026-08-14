
<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th>Cat ID</th>
      <th>Name</th>
      <th>Brand</th>
      <th>Class</th>
      <th>Generic Name</th>
      <th>Single Dose</th>
      <th>Frequency</th> 
      <th>Total Daily Dose</th>                      
    </tr>
  </thead>
  <tbody> 
    @foreach($xrows as $x)
      <tr>
        <td>{{ $x['category_id'] }}</td>
        <td>{{ $x['drug_name']  }}</td>
        <td>{{ $x['brand'] }}</td>
        <td>{{ $x['drug_class'] }}</td>
        <td>{{ $x['generic_name'] }}</td>
        <td>{{ $x['single_dose'] }}</td>
        <td>{{ $x['frequency'] }}</td>
        <td>{{ $x['total_daily_dose'] }}</td>
      </tr>  
    @endforeach
  </tbody>
</table>


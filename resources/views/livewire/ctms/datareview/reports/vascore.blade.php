  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th  align="center">Category</th>
        <th  align="center">Description</th>
        <th  align="center">Tags</th>
        <th  align="center">Uploaded By</th>
        <th  align="center">Created On</th>
        <th  align="center">Uploaded On</th>
        <th  align="center">Status</th>
        <th  align="center">Action</th>
      </tr>
    </thead>
    <tbody> 
      @foreach($c7 as $vals)
        @php
          //dd($c1, $vals, $row);
        @endphp
        <tr>
          <td>
            {{ $vals->report_category }}
          </td>
          <td>
            {{ $vals->report_description }}
          </td>
          <td>
            {{ $vals->tags }}
          </td>
          <td>
            {{ $vals->uploaded_by }}
          </td>
          <td>
            {{ $vals->created_at }}
          </td>
          <td>
            {{ $vals->updated_at }}
          </td>
          <td>
            {{ $vals->report_status }}
          </td>
          <td>
            <button wire:click="fnDownLoadPrimary('{{ $vals->file_uuid }}')" class="btn btn-success font-normal mt-3 rounded">View</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
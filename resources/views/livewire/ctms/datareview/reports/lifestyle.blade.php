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
      @if(count($c2) > 0)
        @foreach($c2 as $row)
        <tr>
          <td>
            <label></label>
            </br>{{ $row->report_category }}
          </td>
          <td>
            <label>report_description</label>
            </br>{{ $row->report_description }}
          </td>
          <td>
            <label>tags</label>
            </br>{{ $row->tags }}
          </td>
          <td>
            <label>Uploaded By</label>
            </br>{{ $row->uploaded_by }}
          </td>
          <td>
            <label>Created On</label>
            </br>{{ $row->created_at }}
          </td>
          <td>
            <label>Updated On</label>
            </br>{{ $row->updated_at }}
          </td>
          <td>
            <label>Status</label>
            </br>{{ $row->report_status }}
          </td>
          <td>
            <button wire:click="fnDownLoadPrimary()" class="btn btn-success font-normal mt-3 rounded">View</button>
          </td>
        </tr>
        @endforeach
      @endif
    </tbody>
  </table>
<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th>Sample Description</th>
      <th>Number of Samples</th>
      <th>Comment</th>
      <th>Status code</th>
      <th>Entered By</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        {{ $enrObj->discectomy_sample_desc }}
      </td>
      <td>
        {{ $enrObj->discectomy_sample_number }}
      </td>
      <td>
        {{ $enrObj->discectomy_sample_comments }}
      </td>
      <td>
        {{ $enrObj->discec_sample_status_code }}
      </td>
      <td>
        {{ $enrObj->discectomy_sample_info_entered_by }}
      </td>
      <td>
        {{ $enrObj->discectomy_sample_info_date_entered }}
      </td>
    </tr>
  </tbody>
</table>

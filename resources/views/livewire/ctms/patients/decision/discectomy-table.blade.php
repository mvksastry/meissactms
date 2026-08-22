<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th>Discectomy Date</th>
      <th>Surgenos</th>
      <th>Other</th>
      <th>Comment</th>
      <th>Status code</th>
      <th>Entered By</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        {{ $enrObj->discectomy_date }}
      </td>
      <td>
        {{ $enrObj->surgeons_names }}
      </td>
      <td>
        {{ $enrObj->discectomy_other_info }}
      </td>
      <td>
        {{ $enrObj->discectomy_comments }}
      </td>
      <td>
        {{ $step_code[$enrObj->discec_status_code] }}
      </td>
      <td>
        {{ $enrObj->disc_info_entered_by }}
      </td>
      <td>
        {{ $enrObj->disc_info_date_entered }}
      </td>
    </tr>
  </tbody>
</table>

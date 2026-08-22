<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th>QC Comment</th>
      <th>QC Other Info</th>
      <th>Status code</th>
      <th>Entered By</th>
      <th>Entered Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        {{ $enrObj->qa_enrollment_comment }}
      </td>
      <td>
        {{ $enrObj->qa_other_infos }}
      </td>
      <td>

      </td>
      <td>
        {{ $enrObj->qa_infos_entered_by }}
      </td>
      <td>
        {{ $enrObj->qa_infos_date_entered }}
      </td>
    </tr>
  </tbody>
</table>

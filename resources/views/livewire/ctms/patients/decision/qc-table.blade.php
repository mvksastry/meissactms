<table id="userIndex2" class="table table-sm table-bordered table-hover">
  <thead>
    <tr>
      <th>QC Rep-1</th>
      <th>QC Rep-2</th>
      <th>QC Rep-3</th>
      <th>CoA</th>
      <th>Other</th>
      <th>Comment</th>
      <th>Status code</th>
      <th>Entered Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        {{ $enrObj->qc_report1_description }}
      </td>
      <td>
        {{ $enrObj->qc_report2_description }}
      </td>
      <td>
        {{ $enrObj->qc_report3_description }}
      </td>
      <td>
        {{ $enrObj->qc_coa_description }}
      </td>
      <td>
        {{ $enrObj->qc_other_infos }}
      </td>
      <td>
        {{ $enrObj->qc_enrollment_comment }}
      </td>
      <td>
        {{ $step_code[$enrObj->qc_status_code] }}
      </td>

      <td>{{ $enrObj->qc_infos_entered_by }} </br>
        {{ $enrObj->qc_infos_date_entered }}
      </td>
    </tr>
  </tbody>
</table>

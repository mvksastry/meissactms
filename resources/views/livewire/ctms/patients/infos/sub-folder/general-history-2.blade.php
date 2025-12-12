  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="4" align="center">Past Complaints</th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="4">
          <label>Past Complaints*</label>
          </br>{{ $patientPrimaryInfo->past_complaints }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Present Complaint(s)*</label>
          </br>{{ $patientPrimaryInfo->present_complaints }}
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Medications - Past*</label>
          </br>{{ $patientPrimaryInfo->past_medications }}
         </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Medications - Present*</label>
          </br>{{ $patientPrimaryInfo->present_medications }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Addictive Substances*</label>
          </br>{{ $patientPrimaryInfo->addictive_substance_use }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Non Addictive Substances*</label>
          </br>{{ $patientPrimaryInfo->non_addictive_substance_use }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Past History*</label>
          </br>{{ $patientPrimaryInfo->past_history }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Family History Notable*</label>
          </br>{{ $patientPrimaryInfo->notable_family_history }}
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Before Problem Occupation*</label>
          </br>{{ $patientPrimaryInfo->before_problem_occupation }}
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Habits*</label>
          </br>{{ $patientPrimaryInfo->general_habits }}
        </td>
      </tr>
    </tbody>
  </table>
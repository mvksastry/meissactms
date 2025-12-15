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
            <input wire:model="form.past_complaints" class="form-control" value="{{ $patientPrimaryInfo->past_complaints }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Present Complaint(s)*</label>
           <input wire:model="form.present_complaints" class="form-control" value="{{ $patientPrimaryInfo->present_complaints }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Medications - Past*</label>
          <input wire:model="form.past_medications" class="form-control" value="{{ $patientPrimaryInfo->past_medications }}"  type="text">
         </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Medications - Present*</label>
          <input wire:model="form.present_medications" class="form-control" value="{{ $patientPrimaryInfo->present_medications }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Addictive Substances*</label>
          <input wire:model="form.addictive_substance_use" class="form-control" value="{{ $patientPrimaryInfo->addictive_substance_use }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Non Addictive Substances*</label>
          <input wire:model="form.non_additictive_substance_use" class="form-control" value="{{ $patientPrimaryInfo->non_addictive_substance_use }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Past History*</label>
          <input wire:model="form.past_history" class="form-control" value="{{ $patientPrimaryInfo->past_history }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Family History Notable*</label>
          <input wire:model="form.notable_family_history" class="form-control" value="{{ $patientPrimaryInfo->notable_family_history }}"  type="text">
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Before Problem Occupation*</label>
          <input wire:model="form.before_problem_occupation" class="form-control" value="{{ $patientPrimaryInfo->before_problem_occupation }}"  type="text">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Habits*</label>
          <input wire:model="form.general_habits" class="form-control" value="{{ $patientPrimaryInfo->general_habits }}"  type="text">
        </td>
      </tr>
    </tbody>
  </table>
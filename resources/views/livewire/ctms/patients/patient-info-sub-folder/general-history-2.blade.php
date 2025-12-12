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
          <input wire:model="form.past_complaints" id="past_complaints" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Present Complaint(s)*</label>
          <input wire:model="form.present_complaints" id="present_complaints" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Medications - Past*</label>
          <input wire:model.defer="form.past_medications" id="past_medications" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Medications - Present*</label>
          <input wire:model="form.present_medications" id="present_medications" type="text"  Value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Addictive Substances*</label>
          <input wire:model="form.addictive_substance_use" id="addictive_substance_use" type="text"  Value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Non Addictive Substances*</label>
          <input wire:model.defer="form.non_addictive_substance_use" id="non_addictive_substance_use" type="text" Value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Past History*</label>
          <input wire:model.defer="form.past_history" id="past_history" type="text"  value="null" class="form-control"placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Family History Notable*</label>
          <input wire:model.defer="form.notable_family_history" id="notable_family_history" type="text"  value="null" class="form-control"placeholder="Description">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Before Problem Occupation*</label>
          <input wire:model.defer="form.before_problem_occupation" id="before_problem_occupation" value="null" type="text" value="null" class="form-control" placeholder="Description" >
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label>Habits*</label>
          <input wire:model.defer="form.general_habits" id="general_habits" type="text" value="null" class="form-control" placeholder="Description">
        </td>
      </tr>
    </tbody>
  </table>
    <table id="userIndex2" class="table table-sm table-bordered table-hover">
      <thead>
        <tr>
          <th colspan="4" align="center">Consent Status</th>
        </tr>
      </thead>
      <tbody>        
        <tr>
          <td colspan="2">
            <label>Consent Status*</label>
            <input wire:model="form.consent_status" id="consent_status"  type="text" value="null" class="form-control" placeholder="Consent Status">
          </td>
          <td colspan="2">
            <label>Consent Date*</label>
            <input wire:model="form.consent_date" id="consent_date"  type="date" class="form-control" placeholder="Consent Date">
          </td>
          <td colspan="2">
            <label>Consent Audio/Video*</label>
            <input wire:model.defer="form.consent_av" id="item_desc" type="text" value="null" class="form-control" value="null" placeholder="Consent A V">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <label>Consent Approval Date*</label>
            <input wire:model="form.consent_approval_date" id="consent_approval_date" type="date" value="null" class="form-control" placeholder="Consent Approval Date">
          </td>
          <td colspan="2">
            <label>Consent Approval Reference*</label>
            <input wire:model="form.consent_approval_reference" id="consent_approval_reference" type="text" value="null" class="form-control" placeholder="Consent Approval Reference">
          </td>
          <td colspan="2">
            <label>Consent Approval File*</label>
            <input wire:model.defer="form.consent_approval_file" id="item_desc" type="text" value="null" class="form-control" placeholder="Consent Approval File">
          </td>
        </tr>
      </tbody>
  </table>
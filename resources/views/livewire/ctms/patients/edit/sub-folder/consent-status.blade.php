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
            <input wire:model="form.consent_status" class="form-control" value="{{ $patientPrimaryInfo->consent_status }}"  type="text">
          </td>
          <td colspan="2">
            <label>Consent Date*</label>
            <input wire:model="form.consent_date" class="form-control" value="{{ $patientPrimaryInfo->consent_date }}"  type="date">
         </td>
          <td colspan="2">
            <label>Consent Audio/Video*</label>
            <input wire:model="form.consent_av" class="form-control" value="{{ $patientPrimaryInfo->consent_av }}"  type="text">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <label>Consent Approval Date*</label>
            <input wire:model="form.consent_approval_date" class="form-control" value="{{ $patientPrimaryInfo->consent_approval_date }}"  type="date">
          </td>
          <td colspan="2">
            <label>Consent Approval Reference*</label>
            <input wire:model="form.consent_approval_reference" class="form-control" value="{{ $patientPrimaryInfo->consent_approval_reference }}"  type="text">
          </td>
          <td colspan="2">
            <label>Consent Approval File*</label>
            <input wire:model="form.consent_approval_file" class="form-control" value="{{ $patientPrimaryInfo->consent_approval_file }}"  type="text">
          </td>
        </tr>
      </tbody>
  </table>

  <button wire:click="fnSaveEditPrimaryInfo()" class="btn btn-warning font-normal mt-3 rounded">EDIT PRIMARY INFO</button>
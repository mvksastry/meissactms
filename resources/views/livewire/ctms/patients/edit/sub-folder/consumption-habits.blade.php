  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="3" align="center"></th>
      </tr>
    </thead>
    <tbody>        
      <tr>
        <td colspan="1">
          <label>Consumption Non Tobacco Gutka Pan*</label>
            <input wire:model="form.consumption_non_tgp" class="form-control" value="{{ $patientPrimaryInfo->consumption_non_tgp }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label>Tobacco*</label>
            <input wire:model="form.consumption_tobacco" class="form-control" value="{{ $patientPrimaryInfo->consumption_tobacco }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="1">
          <label>Gutka*</label>
            <input wire:model="form.consumption_gutka" class="form-control" value="{{ $patientPrimaryInfo->consumption_gutka }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
      </tr>
      <tr>
        <td colspan="1">
          <label>Pan / Masala*</label>
            <input wire:model="form.consumption_pan" class="form-control" value="{{ $patientPrimaryInfo->consumption_pan }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
        <td colspan="2">
          <label>Any Other*</label>
            <input wire:model="form.anyother_habbits" class="form-control" value="{{ $patientPrimaryInfo->anyother_habbits }}" id="opd_id" wire:model="form.opd_id" type="text">
        </td>
      </tr>
    </tbody>
  </table>
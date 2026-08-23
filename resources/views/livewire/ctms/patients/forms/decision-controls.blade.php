  @php
    $step_code = config('ctms.steps');
    $abort_codes = config('ctms.abort_steps');
  @endphp
  <table id="userIndex2" class="table table-sm table-bordered table-hover">
    <thead>
      <tr>
        <th align="center"></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2">
          <button class='btn btn-secondary text-white font-normal rounded'>
            OPD ID: {{ $enrObj->opd_id }}</button> &nbsp;&nbsp;&nbsp;&nbsp;
          <button class='btn btn-secondary text-white font-normal rounded'>
            IPD ID: {{ $enrObj->discectomy_ipd_id }} </button> &nbsp;&nbsp;&nbsp;&nbsp;
          <button class='btn btn-secondary text-white font-normal rounded'>
            Admission Date: {{ $enrObj->discectomy_admission_date }} </button> &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
      </tr>

      <tr>
        <td>
          @include('livewire.ctms.patients.decision.discectomy-table')
        </td>
        <td>
          @include('livewire.ctms.patients.decision.sample-table')
        </td>
      </tr>
      <tr>
        <td>
          @include('livewire.ctms.patients.decision.qc-table')
        </td>
        <td>
          @include('livewire.ctms.patients.decision.qa-table')
        </td>
      </tr>
      <tr>
        <td>
          @include('livewire.ctms.patients.decision.all-infos-green-red')
        </td>
        <td>
          @include('livewire.ctms.patients.decision.decision-form')
        </td>
      </tr>
    </tbody>
  </table>

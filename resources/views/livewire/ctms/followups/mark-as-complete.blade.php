<div>
  {{-- The whole world belongs to you. --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Home: Process Data</h4>
            <h5> Role : {{ ucfirst(Auth::user()->roles->pluck('name')[0]) ?? '' }}
            </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Complete - Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Process Data As Complete: Select Patient
            </h3>
          </div>
          <div class="card-body">
            <!-- /.col-12 -->
            <div class="row">
              @if (count($enrolledPatients) > 0)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Center</th>
                      <th>Clinic</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($enrolledPatients as $row)
                      <tr class="{{ $rowSelected === $row->patient_uuid ? 'table-secondary' : '' }}">
                        <td>
                          {{ $row->center_id }}
                        </td>
                        <td>
                          {{ $row->ctarm_id }}
                        </td>
                        <td>
                          {{ $row->name }}
                        </td>
                        <td>
                          {{ $row->gender }}
                        </td>
                        <td>
                          {{ ucfirst($row->status) }}
                        </td>
                        <td>
                          <button wire:click="selectedPatient('{{ $row->patient_uuid }}')"
                            class="btn btn-block btn-light rounded" type="button"><i class="ion ion-person"></i>&nbsp
                            PROCESS DATA FOR NEXT STEP</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No "Enrolled Patients" or "Data to Display"</th>
                    </tr>
                  </thead>
                </table>
              @endif
            </div>
            <!-- /.col-12 -->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--/ Divider-->
            @if ($fuselection)
              <div class="card-header d-flex p-0">
                <h3 class="card-title text-danger p-3"><strong>Select Data Type</strong></h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div wire:ignore class="tab-content">
                  @include('livewire.ctms.followups.followupnumber')
                </div>
              </div>
            @endif
            <!-- existing data on Follow-ups here -->

            <!-- /existing data on Follow-ups here -->

            @if ($patientInfoButtons)
              <div class="row">

                <div class="col-sm-3 col-md-2">
                  <button disabled wire:click="fnShowPrimaryInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Primary Infos</button>
                </div>

                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFULifeStyleData('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Life Style</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUClinicalInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Clinical</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUSensoryExamInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Sensory Exam</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUMDTRExamInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp M&DTR Exam</button>
                </div>
              </div>
              </br>
              <div class="row">
                <!-- /.col -->

                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUPatientReportUploads('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Reports</button>
                </div>

                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUModifiedPfirmannInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Pfirmann’s Grade</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUVisualAnalogInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Vis. Analog Score</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUMODIQInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp MODQ Score</button>
                </div>

                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFURMQInfo('{{ $patient_uuid }}')" type="button"
                    class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp RMQ Score</button>
                </div>
                <!-- /.col -->
                <!--
                -->
              </div>
              <!--Divider-->

              <!--/ Divider-->
              </br>
            @endif

            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    @if ($p11)
      @include('livewire.ctms.datatables.life-styles-data-table')
      @include('livewire.ctms.datatables.clinical-tests-component')
      @include('livewire.ctms.datatables.sensory-exams-data-table')
      @include('livewire.ctms.datatables.mdtre-data-table')
      @include('livewire.ctms.datatables.patient-reports-data-table')
      @include('livewire.ctms.datatables.pfirmann-grade-data-table')
      @include('livewire.ctms.datatables.va-score-data-table')
      @include('livewire.ctms.datatables.modq-score-data-table')
      @include('livewire.ctms.datatables.rmq-replies-data-table')
    @endif

    @if ($PatientStatusPanel)
      <section class="content">
        <div class="container-fluid">
          <!-- COLOR PALETTE -->
          <div class="card card-default color-palette-box">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Process Data As Complete for the Selected Patient
              </h3>
            </div>
            <div class="card-body">
              <!-- /.col-12 -->
              <div class="row">

              </div>
              <!-- /.col-12 -->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->
              <!-- existing data on Follow-ups here -->
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="4" align="center"></th>
                  </tr>
                </thead>
                <tbody>
                  </tr>

                  @hasrole('senior_resident')
                    <tr>
                      <td>
                        <label>New status</label>
                        <input wire:model="updated_status" disabled placeholder="Cleared">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Comment</label>
                        <input wire:model="status_comment" id="status_comment" type="text"
                          @class(['form-control']) placeholder="Status Update Comment">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <button wire:click="setNewPatientStatus('{{ $patient_uuid }}')" @class(['btn', 'btn-block', 'btn-info', 'rounded'])
                          type="button"><i @class(['ion', 'ion-person'])></i>&nbsp Verified
                          Patient</button>
                      </td>
                    </tr>
                  @endhasanyrole

                  @hasrole('clinical_manager')
                    <tr>
                      <td>
                        <label>New status</label>
                        <input wire:model="updated_status" disabled placeholder="Approved">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Comment</label>
                        <input wire:model="status_comment" id="status_comment" type="text"
                          @class(['form-control']) placeholder="Status Update Comment">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <button wire:click="setNewPatientStatus('{{ $patient_uuid }}')" @class(['btn', 'btn-block', 'btn-info', 'rounded'])
                          type="button"><i @class(['ion', 'ion-person'])></i>&nbsp Approve
                          Patient</button>
                      </td>
                    </tr>
                  @endhasanyrole

                  @hasrole('ctms_incharge')
                    <tr>
                      <td>
                        <label>New status</label>
                        <input wire:model="updated_status" disabled placeholder="Sealed">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Comment</label>
                        <input wire:model="status_comment" id="status_comment" type="text"
                          @class(['form-control']) placeholder="Status Update Comment">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <button wire:click="setNewPatientStatus('{{ $patient_uuid }}')" @class(['btn', 'btn-block', 'btn-info', 'rounded'])
                          type="button"><i @class(['ion', 'ion-person'])></i>&nbsp Seal
                          Patient</button>
                      </td>
                    </tr>
                  @endhasanyrole

                  @hasrole('director')
                    <td>
                      <button wire:click="setNewPatientStatus('{{ $patient_uuid }}')" @class(['btn', 'btn-block', 'btn-info', 'rounded'])
                        type="button"><i @class(['ion', 'ion-person'])></i>&nbsp Post Notes</button>
                    </td>
                  @endhasanyrole
                </tbody>
              </table>
              <!-- /existing data on Follow-ups here -->

              <!-- /.row -->
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--Divider-->

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- START ALERTS AND CALLOUTS -->
        </div><!-- /.container-fluid -->
      </section>
    @endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ChartJS -->
@push('scripts')
  <script>
    < script src = "https://cdn.jsdelivr.net/npm/chart.js" >
  </script>
  let chartInstance = null;

  // Listen for Livewire event to render chart
  window.addEventListener('renderChart', event => {
  /* ChartJS
  * -------
  * Here we will create a few charts using ChartJS
  */

  //--------------
  //- AREA CHART -
  //--------------
  // Get context with jQuery - using jQuery's .get() method.
  //var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = document.getElementById('barChart').getContext('2d');

  // Destroy old chart if exists
  if (chartInstance) {
  chartInstance.destroy();
  }

  //var barChartCanvas = $('#barChart').get(0).getContext('2d')
  //var barChartData = $.extend(true, {}, areaChartData)
  var barChartData = {
  labels : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
  {
  label : 'Digital Goods',
  backgroundColor : 'rgba(60,141,188,0.9)',
  borderColor : 'rgba(60,141,188,0.8)',
  pointRadius : false,
  pointColor : '#3b8bba',
  pointStrokeColor : 'rgba(60,141,188,1)',
  pointHighlightFill : '#fff',
  pointHighlightStroke: 'rgba(60,141,188,1)',
  data : [28, 48, 40, 19, 86, 27, 90]
  },
  {
  label : 'Electronics',
  backgroundColor : 'rgba(210, 214, 222, 1)',
  borderColor : 'rgba(210, 214, 222, 1)',
  pointRadius : false,
  pointColor : 'rgba(210, 214, 222, 1)',
  pointStrokeColor : '#c1c7d1',
  pointHighlightFill : '#fff',
  pointHighlightStroke: 'rgba(220,220,220,1)',
  data : [65, 59, 80, 81, 56, 55, 40]
  },
  ]
  }

  var temp0 = barChartData.datasets[0];
  var temp1 = barChartData.datasets[1];
  barChartData.datasets[0] = temp1;
  barChartData.datasets[1] = temp0;

  var barChartOptions = {
  responsive : true,
  maintainAspectRatio : false,
  datasetFill : false
  }

  new Chart(barChartCanvas, {
  type: 'bar',
  data: barChartData,
  options: barChartOptions
  });

  });
  </script>
@endpush

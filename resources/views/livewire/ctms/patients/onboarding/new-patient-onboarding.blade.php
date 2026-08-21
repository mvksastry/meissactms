<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New On-Boarding : {{ ucfirst(Auth::user()->roles->pluck('name')[0] ?? '') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Patient On-Boarding</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        @hasrole('ctms_incharge')
          <div class="card card-default color-palette-box">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i>
                New Patient On-Boarding Process
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4 col-md-2">
                  <button wire:click="fnOnBoarding()" type="button" class="btn btn-block btn-primary"><i
                      class="ion ion-person"></i>&nbsp Initiate On-Boarding</button>
                </div>
              </div>
              <hr class="border-b-2 border-warning my-2 mx-2">
              @if (count($ob_patient_data_status) > 0)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Center</th>
                      <th>Clinic</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>On-Boarding Status</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ob_patient_data_status as $row)
                      <tr class="{{ $highlightedId === $row->patient_uuid ? 'table-warning' : '' }}">
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
                          {{ ucfirst($row->ob_status) }}
                        </td>
                        <td>
                          <button wire:click="patientDetailsForOnBoarding('{{ $row->patient_uuid }}')"
                            class="btn btn-block btn-warning rounded" type="button"><i class="ion ion-person"></i>&nbsp
                            Details</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No Information to display</th>
                    </tr>
                  </thead>
                </table>
              @endif
              <!--Divider-->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- START ALERTS AND CALLOUTS -->
        @endhasrole
        @hasrole('director')
          <div class="card card-default color-palette-box">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Pending Request for On-Boarding
              </h3>
            </div>
            <div class="card-body">
              <!-- /.col-12 -->
              <!-- /.col-12 -->
              <div class="row">
                @if (count($ob_patient_data_status) > 0)
                  <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Center</th>
                        <th>Clinic</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>On-Boarding Status</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ob_patient_data_status as $row)
                        <tr class="{{ $highlightedId === $row->patient_uuid ? 'table-warning' : '' }}">
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
                            {{ ucfirst($row->ob_status) }}
                          </td>
                          <td>
                            <button wire:click="patientDetailsForOnBoarding('{{ $row->patient_uuid }}')"
                              class="btn btn-block btn-warning rounded" type="button"><i class="ion ion-person"></i>&nbsp
                              Details</button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No Information to display</th>
                      </tr>
                    </thead>
                  </table>
                @endif
              </div>
              <!-- /.row -->
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--Divider-->

            </div>
            <!-- /.card-body -->
          </div>

        @endhasrole

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @hasrole('ctms_incharge')
      @if ($p11)
        <livewire:ctms.patients.onboarding.patient-onboarding-submission />
      @endif
      @if ($p10)
        @include('livewire.ctms.patients.onboarding.onboarding-decision')
      @endif
    @endhasrole
    @hasrole('director')
      @if ($p12)
        @include('livewire.ctms.patients.onboarding.onboarding-decision')
      @endif
    @endhasrole
    <hr class="border-b-2 border-warning my-2 mx-2">
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

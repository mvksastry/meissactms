<div>
  {{-- The whole world belongs to you. --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Decisions : {{ ucfirst(Auth::user()->roles->pluck('name')[0] ?? '') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Decisions/Enrollment</li>
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
              Active Patient List
            </h3>
          </div>
          <div class="card-body">
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">
              @php
                $steps = config('ctms.steps');
                //dd($steps);
              @endphp
            </div>

            <div class="row">
              @if (count($enroll_status) > 0)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Discec Status</th>
                      <th>Sample Status</th>
                      <th>QC Status</th>
                      <th>QA Status</th>
                      <th>Process Status</th>
                      <th>As On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($enroll_status as $row)
                      <tr>
                        <td>
                          @if ($row->discec_status_code >= 200)
                            <span class="badge badge-success">
                              {{ $steps[$row->discec_status_code] }}
                            </span>
                          @else
                            Not Available
                          @endif
                        </td>
                        <td>

                          @if ($row->discec_sample_status_code >= 220)
                            <span class="badge badge-success">
                              {{ $steps[$row->discec_sample_status_code] }}
                            </span>
                          @else
                            Not Available
                          @endif

                        </td>
                        <td>
                          @if ($row->qc_status_code >= 300)
                            <span class="badge badge-success">
                              {{ $steps[$row->qc_status_code] }}
                            </span>
                          @else
                            Not Available
                          @endif
                        </td>
                        <td>
                          @if ($row->qa_status_code >= 300)
                            <span class="badge badge-success">
                              {{ $steps[$row->qa_status_code] }}
                            </span>
                          @else
                            Not Available
                          @endif
                        </td>
                        <td>
                          <span class="badge badge-primary">
                            {{ $steps[$row->stage_code] }}
                          </span </td>
                        <td>
                          {{ $row->created_at }}
                        </td>
                        <td>

                          @hasrole('ctms_incharge')
                            @if ($row->stage_code >= 160)
                              <button wire:click="selectedPatient('{{ $row->patient_uuid }}')"
                                class="btn btn-block btn-warning rounded" type="button"><i
                                  class="ion ion-person"></i>&nbsp
                                Enrollment</button>
                            @endif
                          @endhasrole
                          @hasrole('director')
                            @if ($row->stage_code >= 160)
                              <button wire:click="selectedPatient('{{ $row->patient_uuid }}')"
                                class="btn btn-block btn-warning rounded" type="button"><i
                                  class="ion ion-person"></i>&nbsp
                                Enrollment</button>
                            @endif
                          @endhasrole
                          @if ($row->stage_code < 370)
                            @hasrole('qc_incharge')
                              @if ($row->stage_code >= 220 && $row->stage_code < 300)
                                <button wire:click="selectedPatient('{{ $row->patient_uuid }}')"
                                  class="btn btn-block btn-warning rounded" type="button"><i
                                    class="ion ion-person"></i>&nbsp
                                  Enrollment</button>
                              @endif
                            @endhasrole

                            @hasrole('qa_incharge')
                              @if ($row->stage_code >= 300 && $row->stage_code < 320)
                                <button wire:click="selectedPatient('{{ $row->patient_uuid }}')"
                                  class="btn btn-block btn-warning rounded" type="button"><i
                                    class="ion ion-person"></i>&nbsp
                                  Enrollment</button>
                              @endif
                            @endhasrole
                          @else
                            Locked: View Only
                          @endif
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

            <div class="row">
              <!-- /.col -->
              @if ($p1)
                <livewire:ctms.patients.decision.enrollment-decision-component :patient_uuid="$patient_uuid" :key="$patient_uuid" />
              @endif
            </div>
            </br>

            <div class="row">
              <!-- /.col -->

              <!-- /.col -->
            </div>
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--/ Divider-->

            <!--/ Divider-->
            </br>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <!-- / End of Main Panels  -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

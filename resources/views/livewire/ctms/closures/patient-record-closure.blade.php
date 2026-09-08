<div>
  {{-- Stop trying to control. --}}
  {{-- The Master doesn't talk, he acts. --}}
  {{-- In work, do what you enjoy. --}}
  {{-- The whole world belongs to you. --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Closures : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Closures</li>
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
              Patient Information Closure
            </h3>
          </div>
          <div class="card-body">
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">
              @if (count($patientClosure) > 0)
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
                    @foreach ($patientClosure as $row)
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
                          {{ ucfirst($row->status) }}
                        </td>
                        @hasrole('ctms_incharge')
                          <td>
                            <button wire:click="openPanelP1('{{ $row->patient_uuid }}')"
                              class="btn btn-block btn-warning rounded" type="button"><i class="ion ion-person"></i>&nbsp
                              Initiate Closure</button>
                          </td>
                        @endhasrole
                        @hasrole('director')
                          <td>
                            <button wire:click="openPanelP2('{{ $row->patient_uuid }}')"
                              class="btn btn-block btn-warning rounded" type="button"><i class="ion ion-person"></i>&nbsp
                              Complete Closure</button>
                          </td>
                        @endhasrole
                        <!--
                        <td>
                            <button wire:click="selectedUuidPatient('{{ $row->patient_uuid }}')" class="btn btn-block btn-warning rounded" type="button" ><i class="ion ion-person"></i>&nbsp UUID Details</button>
                        </td>
                        -->
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
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @if ($p1)
      @livewire('ctms.closures.data-closure-request', ['patient_uuid' => $patient_uuid], key($patient_uuid))
    @endif

    @if ($p2)
      @livewire('ctms.closures.data-closure-request', ['patient_uuid' => $patient_uuid], key($patient_uuid))
    @endif

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button wire:click="respondToSaveChanges()" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</div>

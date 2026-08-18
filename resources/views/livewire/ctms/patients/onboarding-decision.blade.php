<section class="content">
  <div class="container-fluid">
    <!-- COLOR PALETTE -->

    <!-- /.card -->
    <!-- START ALERTS AND CALLOUTS -->
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<!-- /.content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              New Patient On-Boarding
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <!--
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                      </li>
                    -->
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="row">
                <div class="col-12">
                  <!-- Custom Tabs -->
                  @if ($errors->any())
                    <div class="text-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  {{-- Success message --}}
                  @if (session()->has('success'))
                    <div class="text-success">
                      {{ session('success') }}
                    </div>
                  @endif

                  <div class="card">
                    <div class="card-header d-flex p-0">
                      <h3 class="card-title p-3">Information</h3>
                      <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Patient</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Official</a>
                        </li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">

                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                          @include('livewire.ctms.patients.infos.sub-folder.center-control')
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                          @include('livewire.ctms.patients.infos.sub-folder.personal-ids')
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                          @include('livewire.ctms.patients.infos.sub-folder.end-controls')
                        </div>
                        <!-- /.tab-pane -->
                        <!-- /.tab-content -->
                      </div><!-- ./End of Tab div -->
                      <hr class="border-b-2 border-warning my-2 mx-2">
                      @hasrole('director')
                        <div>
                          {{-- Care about people's approval and you will be their prisoner. --}}
                          <table id="userIndex2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th colspan="3">Director's Permission</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="2">
                                  <label>Comment</label>
                                  <input wire:model.defer="ob_approval_comment" id="comment_entered_by" type="text"
                                    class="form-control" placeholder="Description">
                                </td>
                              </tr>
                              <tr>
                                <td colspan="1">
                                  <label>Approved By*</label>
                                  <input wire:model="entered_by" id="ob_approval_role" value="{{ $entered_by }}"
                                    type="text" class="form-control" placeholder="Description">
                                </td>
                                <td colspan="1">
                                  <label>Date Approved</label>
                                  <input wire:model="entry_date" id="entry_date" type="date" value="null"
                                    class="form-control" placeholder="Description">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <button wire:click="fnAccordOnboardPermission('{{ $row->patient_uuid }}')"
                                    class="btn btn-success text-white font-normal mt-3 rounded">APPROVE
                                    INFO</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      @endhasrole

                    </div><!-- /.card-body -->
                  </div>
                  <!-- ./card -->
                </div>
                <!-- /.col -->
              </div>
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--Divider-->
            </div>
          </div><!-- /.card-body -->
        </div>
      </section>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>

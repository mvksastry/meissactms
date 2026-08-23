    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
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
                Decision Information For: {{ $patient_uuid }}
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
                    <div wire:ignore class="card">
                      <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">New Enrollment Information</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                          <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Instructions</a>
                          </li>
                          <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Discectomy</a></li>

                          <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Samples</a></li>

                          @hasrole('qc_incharge')
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">QC</a></li>
                          @endhasrole
                          @hasrole('qa_incharge')
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">QA</a></li>
                          @endhasrole
                          <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Decision</a></li>
                          <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">Administrative</a>
                          </li>
                          <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">Transplantation</a>
                          </li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <!-- /.tab-pane -->

                          <div class="tab-pane" id="tab_1">
                            @include('livewire.ctms.patients.forms.enroll-instructions')
                          </div>
                          @hasrole('ctms_incharge')
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.patients.forms.discectomy')
                            </div>
                          @endhasrole
                          <!-- /.tab-pane -->
                          @hasrole('ctms_incharge')
                            <div class="tab-pane" id="tab_3">
                              @include('livewire.ctms.patients.forms.discectomy-samples')
                            </div>
                          @endhasrole
                          <!-- /.tab-pane -->
                          @hasrole('qc_incharge')
                            <div class="tab-pane" id="tab_4">
                              @include('livewire.ctms.patients.forms.qc-qa-infos')
                            </div>
                          @endhasrole
                          @hasrole('qa_incharge')
                            <div class="tab-pane" id="tab_5">
                              @include('livewire.ctms.patients.forms.qa-inputs')
                            </div>
                          @endhasrole
                          <!-- /.tab-pane -->
                          @hasanyrole(['ctms_incharge', 'director'])
                            <div class="tab-pane" id="tab_6">
                              @include('livewire.ctms.patients.forms.decision-controls')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_7">
                              @include('livewire.ctms.patients.forms.administrative')
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_8">
                              @include('livewire.ctms.patients.forms.transplantation')
                            </div>
                          @endhasanyrole
                          <!-- /.tab-pane -->
                          <!-- /.tab-pane -->
                          <!-- /.tab-pane -->

                          <!-- /.tab-content -->
                        </div>

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

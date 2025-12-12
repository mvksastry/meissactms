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
                  Patient Primary Information
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
                @if($message_panel)
                  @include('livewire.error-alerts-callouts')
                @endif
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
                  <!-- Morris chart - Sales -->
                  <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Personal</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Emergency</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Physical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Consents</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">History-1</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">History-2</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">Habits</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              @include('livewire.ctms.patients.patient-info-sub-folder.center_control_information')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.patients.patient-info-sub-folder.personal_ids')
                            </div>

                            <div class="tab-pane" id="tab_3"> 
                              @include('livewire.ctms.patients.patient-info-sub-folder.emergency-contacts')
                            </div>

                            <div class="tab-pane" id="tab_4">
                              @include('livewire.ctms.patients.patient-info-sub-folder.physical-features')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                              @include('livewire.ctms.patients.patient-info-sub-folder.consent-status')
                            </div>

                            <div class="tab-pane" id="tab_6">
                              @include('livewire.ctms.patients.patient-info-sub-folder.general-history-1')
                            </div>

                            <div class="tab-pane" id="tab_7">
                              @include('livewire.ctms.patients.patient-info-sub-folder.general-history-2')
                            </div>

                            <div class="tab-pane" id="tab_8">
                              @include('livewire.ctms.patients.patient-info-sub-folder.consumption-habits')
                              
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_9">
                              @include('livewire.ctms.end-controls')
                              <button wire:click="fnSavePrimaryInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD PRIMARY INFO</button>
                            </div>
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
    </section>

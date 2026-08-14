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
                  Data Review: Patient Reports
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
                        {{-- Success message --}}
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information <label class="text-danger"></label></h3>
                        </div>
                        <div class="card-header d-flex p-0">
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">{{ ucfirst($tab_name['1']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">{{ ucfirst($tab_name['2']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">{{ ucfirst($tab_name['3']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">{{ ucfirst($tab_name['4']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">{{ ucfirst($tab_name['5']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">{{ ucfirst($tab_name['6']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">{{ ucfirst($tab_name['7']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">{{ ucfirst($tab_name['8']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">{{ ucfirst($tab_name['9']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">{{ ucfirst($tab_name['10']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_11" data-toggle="tab">{{ ucfirst($tab_name['11']) }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_12" data-toggle="tab">{{ ucfirst($tab_name['12']) }}</a></li>                           
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_1">
                              @include('livewire.ctms.datareview.reports.primary')
                            </div>
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.datareview.reports.lifestyle')
                            </div>
                            <div class="tab-pane" id="tab_3">
                              @include('livewire.ctms.datareview.reports.clinchems')
                            </div>
                            <div class="tab-pane" id="tab_4">
                              @include('livewire.ctms.datareview.reports.sensory')
                            </div>
                            <div class="tab-pane" id="tab_5">
                              @include('livewire.ctms.datareview.reports.mdtre')
                            </div>
                            <div class="tab-pane" id="tab_6">
                              @include('livewire.ctms.datareview.reports.pfirmanns')
                            </div>
                            <div class="tab-pane" id="tab_7">
                              @include('livewire.ctms.datareview.reports.vascore')
                            </div>
                            <div class="tab-pane" id="tab_8">
                              @include('livewire.ctms.datareview.reports.modq')
                            </div>
                            <div class="tab-pane" id="tab_9">
                              @include('livewire.ctms.datareview.reports.rmq')
                            </div>
                            <div class="tab-pane" id="tab_10">
                              @include('livewire.ctms.datareview.reports.misc1')
                            </div>
                            <div class="tab-pane" id="tab_11">
                              @include('livewire.ctms.datareview.reports.misc2')
                            </div>
                            <div class="tab-pane" id="tab_12">
                              @include('livewire.ctms.datareview.reports.enroll')
                            </div>
                          </div><!-- ./End of Tab div -->
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



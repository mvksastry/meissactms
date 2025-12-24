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
                  Clinical Investigations
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
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Cryptic</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">BR</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">LFT-Elect</a></li>

                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">RFT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">BS/CRP/IL6</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">PLI</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">CE</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">ME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">UR</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">GS</a></li>

                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              @include('livewire.ctms.patients.infos.clinicals.tab1_cryptic')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.patients.infos.clinicals.tab2_blood-routine')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                              @include('livewire.ctms.patients.infos.clinicals.tab3_lft-electro')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_4">
                              @include('livewire.ctms.patients.infos.clinicals.tab4_renal-test')
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_5">
                              @include('livewire.ctms.patients.infos.clinicals.tab5_bs-crp-il6')
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_6">
                              @include('livewire.ctms.patients.infos.clinicals.tab6_path-lab-invest')
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_7">
                              @include('livewire.ctms.patients.infos.clinicals.tab7_chem-exam')
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_8">
                              @include('livewire.ctms.patients.infos.clinicals.tab8_microscopic')
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_9">
                              @include('livewire.ctms.patients.infos.clinicals.tab9_urine-routine')
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_10">
                              @include('livewire.ctms.patients.infos.clinicals.tab10_gen-summary')
                            </div>
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

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
                  All Clinical Investigations : <label class="text-danger"> {{ ucfirst($data_type) }}
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
                          <h3 class="card-title p-3">Information
                            </label></h3>
                          <ul class="nav nav-pills ml-auto p-2">

                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">BR</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">LFT-Elect</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">RFT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">BS/CRP/IL6</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">PLI</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">CE</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">ME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">UR</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">GS</a></li>

                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              <label>Blood Routine</label>
                              <livewire:ctms.datatables.clinicals.blood-routine-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                              <label>Liver Function & Electrolytes</label>
                              <livewire:ctms.datatables.clinicals.liver-functions-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                              <label>Electrolytes</label>
                              <livewire:ctms.datatables.clinicals.electrolytes-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_4">
                              <label>Renal Function</label>
                              <livewire:ctms.datatables.clinicals.renal-function-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_5">
                              <label>Blood Sugar</label>
                              <livewire:ctms.datatables.clinicals.blood-sugar-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                              <label>CRP</label>
                              <livewire:ctms.datatables.clinicals.crp-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                              <label>IL6</label>
                              <livewire:ctms.datatables.clinicals.il6-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_6">
                              <label>Laboratory Exams</label>
                              <livewire:ctms.datatables.clinicals.lab-exams-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_7">
                              <label>Chemical Exams</label>
                              <livewire:ctms.datatables.clinicals.chemical-exam-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_8">
                              <label>Microscopic Exams</label>
                              <livewire:ctms.datatables.clinicals.microscopic-exams-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_9">
                              <label>Urine Routine</label>
                              <livewire:ctms.datatables.clinicals.urine-routine-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
                            </div>
                            <!-- /.tab-content -->
                            <div class="tab-pane" id="tab_10">
                              <label>General Summary</label>
                              <livewire:ctms.datatables.clinicals.general-summary-data-table :patient_uuid="$patient_uuid"
                                :data_type="$data_type" />
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

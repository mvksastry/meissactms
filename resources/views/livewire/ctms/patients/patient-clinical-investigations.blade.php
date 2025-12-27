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
                          <h3 class="card-title p-3">New Patient Clinical Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Controls</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Over</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">RBI</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">LFT&Elec</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">RFT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">BS/CRP/IL6</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">PLI</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">CE</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">ME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">UR</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_11" data-toggle="tab">Misc</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_12" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td>
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                                    </td>
                                    <td>
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" id="aadhar_id" type="date" value="null" class="form-control" placeholder="Admission Date">
                                    </td>
                                  </tr> 
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              @include('livewire.ctms.patients.forms.cb-1')
                            </div>
                            <!-- /.tab-pane -->
                            @if($entry == "update")
                              <div class="tab-pane" id="tab_3">
                                <livewire:ctms.patients.clinicals.blood-routine-component :patient_uuid="$patient_uuid" />
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_4">
                                <livewire:ctms.patients.clinicals.liver-functions :patient_uuid="$patient_uuid" />
                                <livewire:ctms.patients.clinicals.electrolyte-component :patient_uuid="$patient_uuid" />
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_5">
                                <livewire:ctms.patients.clinicals.renal-function-component :patient_uuid="$patient_uuid" />
                                <livewire:ctms.patients.clinicals.blood-urea-component :patient_uuid="$patient_uuid" />
                                <livewire:ctms.patients.clinicals.creatinine-component :patient_uuid="$patient_uuid" />
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_6">
                                <livewire:ctms.patients.clinicals.blood-sugar-component :patient_uuid="$patient_uuid" />
                                <livewire:ctms.patients.clinicals.crp-component :patient_uuid="$patient_uuid" />
                                <livewire:ctms.patients.clinicals.il6-component :patient_uuid="$patient_uuid" />
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_7">
                                <livewire:ctms.patients.clinicals.laboratory-exams :patient_uuid="$patient_uuid" />                  
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_8">
                                <livewire:ctms.patients.clinicals.chemical-exam-component :patient_uuid="$patient_uuid" />
                              </div> 
                              <!-- /.tab-pane -->     
                              <div class="tab-pane" id="tab_9">
                                <livewire:ctms.patients.clinicals.microscopic-exams :patient_uuid="$patient_uuid" />                           
                              </div> 
                              <!-- /.tab-pane -->   
                              <div class="tab-pane" id="tab_10">
                                <livewire:ctms.patients.clinicals.urine-routine-component :patient_uuid="$patient_uuid" />                
                              </div> 
                              <!-- /.tab-pane -->     
                              <div class="tab-pane" id="tab_11">
                                <livewire:ctms.patients.clinicals.general-summary-component :patient_uuid="$patient_uuid" />                          
                              </div>  
                            @endif
                              <!-- /.tab-pane -->                                                                                                                                                                                    
                              <div class="tab-pane" id="tab_12">
                                @include('livewire.ctms.end-controls')
                                <button wire:click="fnSaveClinicalData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD CLINICAL INFO</button>
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
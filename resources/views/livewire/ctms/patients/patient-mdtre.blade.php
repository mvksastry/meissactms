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
                  Motor & Deep Tendon Reflex Examination
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
                    </div>
                    <div class="col-4">
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Guide Score</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <table id="userIndex2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">Grade</th>
                                <th class="text-center">Muscle Power</th>
                              </tr>
                            </thead>
                            <tbody> 
                              <tr>
                                <td class="text-center">0</td>
                                <td class="text-center">No muscle contraction seen</td>
                              </tr>
                              <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Flicker or contraction seen</td>
                              </tr>
                              <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">Active moment only with gravity seen</td>
                              </tr>
                              <tr>
                                <td class="text-center">3</td>
                                <td class="text-center">Active moment against gravity but not resistance</td>
                              </tr>
                              <tr>
                                <td class="text-center">4</td>
                                <td class="text-center">Active moment against gravity but some resistance</td>
                              </tr>
                              <tr>
                                <td class="text-center">5</td>
                                <td class="text-center">Active moment against gravity with full resistance</td>
                              </tr>
                            </tbody>
                          </table>                       
                        </div><!-- /.card-body -->
                      </div>
                    </div>
                    <div class="col-8">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Observations</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Provocative Test</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Gait Analysis</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Official</a></li>
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

                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Hip Flexion Adduction *</label>
                                      <input wire:model.defer="form.hip_flex_adduction" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Hip Flexion Adduction ">
                                    </td>
                                    <td>
                                      <label>Knee Extension *</label>
                                      <input wire:model.defer="form.knee_extension" id="pan_num" type="text" value="null" class="form-control" placeholder="Knee Extension ">
                                    </td>
                                    <td>
                                      <label>Ankle dorsiflexion*</label>
                                      <input wire:model.defer="form.ankle_dorsiflexion" id="other_id" type="text" value="null" class="form-control" placeholder="Ankle dorsiflexion" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Decreased Patellar Reflex*</label>
                                      <input wire:model.defer="form.decreased_patellar_reflex" id="other_id" type="text" value="null" class="form-control" placeholder="Decreased Patellar Reflex" >
                                    </td>
                                    <td>
                                      <label>Extensor Hallucis longus*</label>
                                      <input wire:model.defer="form.extensor_hallucis_longus" id="other_id" type="text" value="null" class="form-control" placeholder="Extensor Hallucis longus" >
                                    </td>

                                    <td>
                                      <label>Hip Abduction*</label>
                                      <input wire:model.defer="form.hip_abduction" id="other_id" type="text" value="null" class="form-control" placeholder="Hip Abduction" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Ankle plantar flexion*</label>
                                      <input wire:model.defer="form.ankle_plantar_flexion" id="other_id" type="text" value="null" class="form-control" placeholder="Ankle plantar flexion" >
                                    </td>
                                    <td>
                                      <label>Decreased Achilles Tendon Reflex *</label>
                                      <input wire:model.defer="form.dec_achilles_tendon_reflex" id="other_id" type="text" value="null" class="form-control" placeholder="Decreased Achilles Tendon Reflex " >
                                    </td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          <div class="tab-pane" id="tab_3">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="5" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Straight leg raise*</label>
                                      <input wire:model.defer="form.straight_leg_raise" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td>
                                      <label>Contralateral SLR*</label>
                                      <input wire:model.defer="form.contralateral_slr" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Femoral nerve stretch test*</label>
                                      <input wire:model.defer="form.femoral_nerve_stretch_test" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                          </div>
                          <div class="tab-pane" id="tab_4">
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Trendelenburg gait*</label>
                                      <input wire:model.defer="form.trendelenburg_gait" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td>
                                      <label>Antalgic gait *</label>
                                      <input wire:model.defer="form.antalgic_gait" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td>
                                      <label>List*</label>
                                      <input wire:model.defer="form.list" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                  </tr>                                   
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                              @include('livewire.ctms.end-controls')
                              <button wire:click="fnSaveMDTREInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD MDTRE INFO</button>
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

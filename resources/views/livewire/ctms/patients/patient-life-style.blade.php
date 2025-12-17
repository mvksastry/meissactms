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
                  Life Style Observations
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
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Life Style</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Official</a></li>
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
                                  <tr>  
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Cross Leg Sitting</label>
                                      <input wire:model.defer="form.cross_leg_sitting" id="oande" type="text" value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>Standing</label>
                                      <input wire:model.defer="form.standing" id="pr" type="text" value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>Sitting</label>
                                      <input wire:model.defer="form.sitting" id="pr" type="text" value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls3" id="temperature" type="text" value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls4" id="bp_systolic" type="text" value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls5" id="bp_diastolic" type="text" value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls6" id="bp_diastolic" type="text" value="null" class="form-control" placeholder="--" >
                                    </td>
                                  </tr>
        
                                  <tr>
                                    <td colspan="6">
                                      <div class="form-group">
                                        <label>Life Style Description</label>
                                        <textarea wire:model.defer="form.life_style_description" id="adverse_events" class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                      </div>
                                    </td>
                                  </tr>                           
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                              @include('livewire.ctms.end-controls')
                              <button wire:click="fnSavePatientLSInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD LIFE STYLE INFO</button>
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


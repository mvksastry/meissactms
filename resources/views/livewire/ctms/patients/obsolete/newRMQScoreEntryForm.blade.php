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
                  RMQ: Roland Morris Low Back Pain and Disability Questionnaire Score
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
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">RMQ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" type="date" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                  <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.aadhar_id" id="aadhar_id" type="text" value="null" class="form-control" placeholder="Aadhar ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Date*</label>
                                      <input wire:model.defer="form.pan_num" id="pan_num" type="text" value="null" class="form-control" placeholder="PAN">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report File*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                  </tr>  
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="6" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <div class="form-group">
                                        <label>Event</label>
                                        <textarea wire:model.defer="form.adverse_events" id="adverse_events" class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                  </tr>
                                  <tr>
                                  </tr>
                                  <tr>
                                  </tr>                                    
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                              @include('livewire.ctms.patients.controls')
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-content -->
                          </div>
                          <button wire:click="fnSavePrimaryInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD PRIMARY INFO</button>
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
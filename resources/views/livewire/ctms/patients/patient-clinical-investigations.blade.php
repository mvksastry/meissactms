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
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Investigations</a></li>
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
                                      <label>O E*</label>
                                      <input wire:model.defer="form.oande" id="oande" type="text" value="null" class="form-control" placeholder="O E">
                                    </td>
                                    <td>
                                      <label>PR*</label>
                                      <input wire:model.defer="form.pr" id="pr" type="text" value="null" class="form-control" placeholder="PR">
                                    </td>
                                    <td>
                                      <label>Temperature*</label>
                                      <input wire:model.defer="form.temperature" id="temperature" type="text" value="null" class="form-control" placeholder="Temperature" >
                                    </td>
                                    <td>
                                      <label>BP-Systolic*</label>
                                      <input wire:model.defer="form.bp_systolic" id="bp_systolic" type="text" value="null" class="form-control" placeholder="BP Systolic" >
                                    </td>
                                    <td>
                                      <label>BP-Diastolic*</label>
                                      <input wire:model.defer="form.bp_diastolic" id="bp_diastolic" type="text" value="null" class="form-control" placeholder="BP Diastolic" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>CVS*</label>
                                      <input wire:model.defer="form.cvs" id="cvs" type="text" value="null" class="form-control" placeholder="CVS" >
                                    </td>

                                    <td>
                                      <label>P/A*</label>
                                      <input wire:model.defer="form.panda" id="panda" type="text" value="null" class="form-control" placeholder="P/A" >
                                    </td>
                                    <td>
                                      <label>CNS*</label>
                                      <input wire:model.defer="form.cns" id="cns" type="text" value="null" class="form-control" placeholder="CNS" >
                                    </td>
                                    <td>
                                      <label>CBC*</label>
                                      <input wire:model.defer="form.cbc" id="cbc" type="text" value="null" class="form-control" placeholder="CBC" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>ESR*</label>
                                      <input wire:model.defer="form.esr" id="esr" type="text" value="null" class="form-control" placeholder="ESR" >
                                    </td>
                                    <td>
                                      <label>CRP*</label>
                                      <input wire:model.defer="form.crp" id="crp" type="text" value="null" class="form-control" placeholder="CRP" >
                                    </td>
                                    <td>
                                      <label>RFT*</label>
                                      <input wire:model.defer="form.rft" id="rft" type="text" value="null" class="form-control" placeholder="RFT" >
                                    </td>
                                    <td>
                                      <label>LFT*</label>
                                      <input wire:model.defer="form.lft" id="lft" type="text" value="null" class="form-control" placeholder="LFT" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Clotting Time*</label>
                                      <input wire:model.defer="form.clotting_time" id="clotting_time" type="text" value="null" class="form-control" placeholder="Clotting Time" >
                                    </td>
                                    <td>
                                      <label>Bleeding Time*</label>
                                      <input wire:model.defer="form.bleeding_time" id="bleeding_time" type="text" value="null" class="form-control" placeholder="Bleeding Time" >
                                    </td>
                                    <td>
                                      <label>Prothrombin time*</label>
                                      <input wire:model.defer="form.prothrombin_time" id="prothrombin_time" type="text" value="null" class="form-control" placeholder="Prothrombin Time" >
                                    </td>

                                    <td>
                                      <label>Procalcitonin*</label>
                                      <input wire:model.defer="form.procalcitonin" id="procalcitonin" type="text" value="null" class="form-control" placeholder="Precalcitonin" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="6">
                                      <label>Laboratory Report File*</label>
                                      <input wire:model.defer="form.lab_report_file" id="lab_report_file" type="text" value="null" class="form-control" placeholder="Report File" >
                                    </td>
                                  </tr>                                    
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
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

<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
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
                  Edit Modified Pfirmann’s Grade - Date Created: {{ $pfirmg_info->created_at }}
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
                    <div class="col-6">
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Guide Image</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          
                          <img src="{{asset('assets/dist/img/MPGrades.png')}}" alt="AdminLTE Logo" class="img-fluid" style="opacity: .8">                       
                        </div><!-- /.card-body -->
                      </div>
                    </div>
                    <div class="col-6">
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Observations</a></li>
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
                                      <input wire:model="form.opd_id" id="opd_id" type="text" value="{{ $pfirmg_info->opd_id }}" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" value="{{ $pfirmg_info->in_patient_id }}" type="text" class="form-control" placeholder="In Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" type="date" value="{{ $pfirmg_info->report_date }}" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" id="aadhar_id" type="date" value="{{ $pfirmg_info->admission_date }}" class="form-control" placeholder="Admission Date">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Date*</label>
                                      <input wire:model.defer="form.discharge_date" id="pan_num" type="date" value="{{ $pfirmg_info->discharge_date }}" class="form-control" placeholder="Discharge Date">
                                    </td>
                                  </tr>  
                                </tbody>
                              </table>
                            </div>

                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th class="text-center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td>
                                      <label>Modified Pfirmann Grade (see Image on left as guide)*</label>
                                      <input wire:model="form.modified_pfirmans_grade" id="modified_pfirmans_grade" type="text" value="{{ $pfirmg_info->modified_pfirman_grade }}" class="form-control" placeholder="Modified Pfirmans Grade">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th colspan="3" align="center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>        
                                    <tr>
                                        <td colspan="1">
                                        <label>Entered By*</label>
                                        <input wire:model="form.entered_by" id="entered_by" value="{{ $pfirmg_info->entered_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date*</label>
                                        <input wire:model="form.entry_date" id="entry_date" value="{{ $pfirmg_info->entry_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Verified By*</label>
                                        <input wire:model.defer="form.verified_by" id="consumption_gutka" value="{{ $pfirmg_info->verified_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Verified Date*</label>
                                        <input wire:model.defer="form.verified_date" id="consumption_gutka" value="{{ $pfirmg_info->verified_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Entry Sealed By*</label>
                                        <input wire:model="form.entry_sealed_by" id="entry_sealed_by" value="{{ $pfirmg_info->sealed_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="2">
                                        <label>Sealed Date*</label>
                                        <input wire:model="form.entry_sealed_date" id="entry_sealed_date" value="{{ $pfirmg_info->sealed_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                              
                              <button wire:click="fnSavePfirmannGrade()" class="btn btn-warning font-normal mt-3 rounded">ADD PFIRMANN SCORE</button>
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

</div>

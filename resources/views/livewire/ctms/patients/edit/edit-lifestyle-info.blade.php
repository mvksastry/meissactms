<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
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
                  Edit Life Style Observations - Date Created: {{ $ls_info->created_at }}
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
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" value="{{ $ls_info->opd_id }}" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" value="{{ $ls_info->in_patient_id }}" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" value="{{ $ls_info->report_date }}" type="date" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                  <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" id="aadhar_id" value="{{ $ls_info->admission_date }}" type="date" value="null" class="form-control" placeholder="Admission Date">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Date*</label>
                                      <input wire:model.defer="form.discharge_date" id="pan_num" value="{{ $ls_info->discharge_date }}" type="date" value="null" class="form-control" placeholder="Discharge Date">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report*</label>
                                      <input wire:model.defer="form.discharge_report" id="discharge_report" value="{{ $ls_info->discharge_report }}" type="text" value="null" class="form-control" placeholder="" >
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report File*</label>
                                      <input wire:model.defer="form.discharge_report_file" id="discharge_report_file" value="{{ $ls_info->discharge_report_file }}" type="text" value="null" class="form-control" placeholder="Discharge Report FIle" >
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
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Cross Leg Sitting*</label>
                                      <input wire:model.defer="form.cross_leg_sitting" id="oande" value="{{ $ls_info->cross_leg_sitting }}" type="text" value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>Standing*</label>
                                      <input wire:model.defer="form.standing" id="pr" type="text" value="{{ $ls_info->standing }}" value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls3" id="temperature" type="text" value="{{ $ls_info->ls3 }}" value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls4" id="bp_systolic" type="text" value="{{ $ls_info->ls4 }}" value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls5" id="bp_diastolic" type="text" value="{{ $ls_info->ls5 }}" value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls6" id="bp_diastolic" type="text" value="{{ $ls_info->ls6 }}" value="null" class="form-control" placeholder="--" >
                                    </td>
                                  </tr>
        
                                  <tr>
                                    <td colspan="6">
                                      <div class="form-group">
                                        <label>Life Style Description</label>
                                        <textarea wire:model.defer="form.life_style_description" id="adverse_events" value="{{ $ls_info->life_style_description }}" class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                      </div>
                                    </td>
                                  </tr>                           
                                </tbody>
                              </table>
                            </div>
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
                                        <input wire:model="form.entered_by" id="entered_by" value="{{ $ls_info->entered_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date*</label>
                                        <input wire:model="form.entry_date" id="entry_date" value="{{ $ls_info->entry_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Verified By*</label>
                                        <input wire:model.defer="form.verified_by" id="consumption_gutka" value="{{ $ls_info->verified_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Verified Date*</label>
                                        <input wire:model.defer="form.verified_date" id="consumption_gutka" value="{{ $ls_info->verified_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Entry Sealed By*</label>
                                        <input wire:model="form.entry_sealed_by" id="entry_sealed_by" value="{{ $ls_info->sealed_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="2">
                                        <label>Sealed Date*</label>
                                        <input wire:model="form.entry_sealed_date" id="entry_sealed_date" value="{{ $ls_info->sealed_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button wire:click="fnSavePatientLSInfo()" class="btn btn-warning font-normal mt-3 rounded">EDIT LIFE STYLE INFO</button>
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

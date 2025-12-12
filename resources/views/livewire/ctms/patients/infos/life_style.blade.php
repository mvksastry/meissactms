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
                          </br>{{ $ls_info->opd_id }}
                          <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
                        </td>
                        <td colspan="1">
                          <label>In Patient ID*</label>
                          </br>{{ $ls_info->in_patient_id }}
                          <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                        </td>
                        <td colspan="1">
                          <label>Investigation Report Date*</label>
                          </br>{{ $ls_info->report_date }}
                          <input wire:model="form.report_date" id="report_date" type="date" class="form-control" placeholder="Report Date">
                        </td>
                      </tr>
                      <tr>
                      <td colspan="1">
                          <label>Admission Date*</label>
                          </br>{{ $ls_info->admission_date }}
                          <input wire:model.defer="form.admission_date" id="aadhar_id" type="date" value="null" class="form-control" placeholder="Admission Date">
                        </td>
                        <td colspan="1">
                          <label>Discharge Date*</label>
                          </br>{{ $ls_info->discharge_date }}
                          <input wire:model.defer="form.discharge_date" id="pan_num" type="date" value="null" class="form-control" placeholder="Discharge Date">
                        </td>
                        <td colspan="1">
                          <label>Discharge Report*</label>
                          </br>{{ $ls_info->discharge_report }}
                          <input wire:model.defer="form.discharge_report" id="discharge_report" type="text" value="null" class="form-control" placeholder="" >
                        </td>
                        <td colspan="1">
                          <label>Discharge Report File*</label>
                          </br>{{ $ls_info->discharge_report_file }}
                          <input wire:model.defer="form.discharge_report_file" id="discharge_report_file" type="text" value="null" class="form-control" placeholder="Discharge Report FIle" >
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
                          </br>{{ $ls_info->cross_leg_sitting }}
                        </td>
                        <td>
                          <label>Standing*</label>
                          </br>{{ $ls_info->standing }}
                        </td>
                        <td>
                          <label>---*</label>
                          </br>{{ $ls_info->ls3 }}
                         </td>
                        <td>
                          <label>---*</label>
                          </br>{{ $ls_info->ls4 }}
                       </td>
                        <td>
                          <label>---*</label>
                          </br>{{ $ls_info->ls5 }}
                        </td>
                        <td>
                          <label>---*</label>
                          </br>{{ $ls_info->ls6 }}
                        </td>
                      </tr>

                      <tr>
                        <td colspan="6">
                          <div class="form-group">
                            <label>Life Style Description</label>
                            </br>{{ $ls_info->life_style_description }}
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
<div>
    {{-- Do your work, then step back. --}}
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
                  Edit Visual Analog Score - Date Created: {{ $vascore->created_at }}
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
                          
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <img src="{{asset('assets/dist/img/VASscore.png')}}" alt="AdminLTE Logo" class="w-75 h-75 object-fit-cover" style="opacity: .8">
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
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">VAS</a></li>
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
                                      <input wire:model="form.opd_id" id="opd_id" type="text" value="{{ $vascore->created_at }}" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" value="{{ $vascore->created_at }}" type="text" class="form-control">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" type="date" value="{{ $vascore->created_at }}" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                  <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" id="Admission Date" type="date" value="{{ $vascore->created_at }}" class="form-control" placeholder="Admission Date">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Date*</label>
                                      <input wire:model.defer="form.discharge_date" id="Discharge Date" type="date" value="{{ $vascore->created_at }}" class="form-control" placeholder="Discharge Date">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report*</label>
                                      <input wire:model.defer="form.discharge_report" id="Discharge Report" type="text" value="{{ $vascore->created_at }}" class="form-control" placeholder="Discharge Report" >
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report File*</label>
                                      <input wire:model.defer="form.discharge_report_file" id="Discharge Report File" type="text" value="{{ $vascore->created_at }}" class="form-control" placeholder="Discharge Rep File" >
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
                                    <td colspan="1">
                                      <label>Intensity</label>
                                      <input wire:model="form.intensity" id="intensity" value="{{ $vascore->intensity }}" type="text" class="form-control" placeholder="Intensity">
                                    </td>
                                    <td colspan="1">
                                      <label>Location</label>
                                      <input wire:model.defer="form.location" id="location" value="{{ $vascore->location }}" type="text" class="form-control" placeholder="Location">
                                    </td>
                                    <td colspan="1">
                                      <label>Onset</label>
                                      <input wire:model="form.onset" id="onset" type="text" value="{{ $vascore->onset }}" class="form-control" placeholder="Onset">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Duration</label>
                                      <input wire:model="form.duration" id="duration" type="text" value="{{ $vascore->duration }}" class="form-control" placeholder="Duration">
                                    </td>
                                    <td colspan="1">
                                      <label>Variation</label>
                                      <input wire:model="form.variation" id="variation" type="text" value="{{ $vascore->variation }}" class="form-control" placeholder="Variation">
                                    </td>
                                    <td colspan="1">
                                      <label>Quality</label>
                                      <input wire:model="form.quality" id="quality" type="text" value="{{ $vascore->quality }}" class="form-control" placeholder="Quality">
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
                                        <input wire:model="form.entered_by" id="entered_by" value="{{ $vascore->entered_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date*</label>
                                        <input wire:model="form.entry_date" id="entry_date" value="{{ $vascore->entry_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Verified By*</label>
                                        <input wire:model.defer="form.verified_by" id="consumption_gutka" value="{{ $vascore->verified_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Verified Date*</label>
                                        <input wire:model.defer="form.verified_date" id="consumption_gutka" value="{{ $vascore->verified_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Entry Sealed By*</label>
                                        <input wire:model="form.entry_sealed_by" id="entry_sealed_by" value="{{ $vascore->sealed_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="2">
                                        <label>Sealed Date*</label>
                                        <input wire:model="form.entry_sealed_date" id="entry_sealed_date" value="{{ $vascore->sealed_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                             
                              <button wire:click="fnSaveVAscoreData()" class="btn btn-success text-white font-normal mt-3 rounded">ADD VA Scores</button>
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

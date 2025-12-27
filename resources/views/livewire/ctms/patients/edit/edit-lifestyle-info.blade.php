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
                  Edit Life Style Observations: Date Created: {{ $ls_info->created_at }}
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
                        @if($sys_panel)
                          @include('livewire.eac_sys_panel')
                        @endif
                        @if($msg_panel)
                          @include('livewire.eac_msg_panel')
                        @endif
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
                      <!-- Custom Tabs -->
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information: Unique ID: {{ $ls_info->patient_uuid }}</h3>
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
                                      <input wire:model.defer="form.opd_id" @if(!$empty_result)value="{{ $ls_info->opd_id }}"@endif type="text" class="form-control"  placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" @if(!$empty_result)value="{{ $ls_info->in_patient_id }}"@endif type="text" class="form-control" placeholder="In Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" @if(!$empty_result)value="{{ $ls_info->admission_date }}"@endif type="date" class="form-control" placeholder="Admission Date">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                      <label>Discharge Report File*</label>
                                      <input wire:model.defer="form.discharge_report_file" @if(!$empty_result)value="{{ $ls_info->discharge_report_file }}"@endif type="text" class="form-control" placeholder="Discharge Report FIle" >
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
                                      <input wire:model.defer="form.cross_leg_sitting" id="oande" @if(!$empty_result)value="{{ $ls_info->cross_leg_sitting }}"@endif type="text" value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>Standing*</label>
                                      <input wire:model.defer="form.standing" id="pr" type="text" @if(!$empty_result)value="{{ $ls_info->standing }}"@endif value="null" class="form-control" placeholder="--">
                                    </td>
                                    <td>
                                      <label>Sitting*</label>
                                      <input wire:model.defer="form.sitting" id="temperature" type="text" @if(!$empty_result)value="{{ $ls_info->sitting }}"@endif value="null" class="form-control" placeholder="--" >
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls3" id="temperature" type="text" @if(!$empty_result)value="{{ $ls_info->ls3 }}"@endif value="null" class="form-control" placeholder="--" >
                                    </td>

                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls4" id="bp_systolic" type="text" @if(!$empty_result)value="{{ $ls_info->ls4 }}"@endif value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls5" id="bp_diastolic" type="text" @if(!$empty_result)value="{{ $ls_info->ls5 }}"@endif value="null" class="form-control" placeholder="--" >
                                    </td>
                                    <td>
                                      <label>---*</label>
                                      <input wire:model.defer="form.ls6" id="bp_diastolic" type="text" @if(!$empty_result)value="{{ $ls_info->ls6 }}"@endif value="null" class="form-control" placeholder="--" >
                                    </td>
                                  </tr>
        
                                  <tr>
                                    <td colspan="6">
                                      <div class="form-group">
                                        <label>Life Style Description</label>
                                        <textarea wire:model.defer="form.life_style_description" id="adverse_events" @if(!$empty_result)value="{{ $ls_info->life_style_description }}"@endif class="form-control" rows="4" placeholder="Enter ..."></textarea>
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
                                        <td colspan="3">
                                        <label>Verified By*</label>
                                        <input wire:model.defer="form.comment_entered_by" id="consumption_gutka" @if(!$empty_result)value="{{ $ls_info->comment_entered_by }}"@endif type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="1">
                                        <label>Entered By*</label>
                                        <input wire:model="form.entered_by" id="entered_by" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date*</label>
                                        <input wire:model="form.entry_date" id="entry_date" @if(!$empty_result)value="{{ $ls_info->entry_date }}"@endif type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>
                                <button wire:click="fnSaveEditedLSInfo()" class="btn btn-warning font-normal mt-3 rounded">EDIT LIFE STYLE INFO</button>
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

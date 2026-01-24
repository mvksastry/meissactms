<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
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
                  Edit Sensory Examinations - Dermatome Grades Date Created: {{ ($se_info != null) ? $se_info->created_at : ""; }}
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
                          <table id="userIndex2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">Grading for Each Dermatome (from 0-2): 0=absent, 1=altered, 2=normal</th>
                              </tr>
                            </thead>
                            <tbody> 
                              <tr>
                                <td class="text-center">
                                  <img src="{{asset('assets/dist/img/SEimage.png')}}" alt="AdminLTE Logo" class="w-75 h-75 object-fit-cover" style="opacity: .8">
                                </td>
                              </tr>
                            </tbody>
                          </table>                       
                        </div><!-- /.card-body -->
                      </div>
                    </div>
                    <div class="col-6">
                      <!-- Custom Tabs -->
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
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information</h3>
                          <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Sensory</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="3">Clinical</th>
                                  </tr>
                                </thead>

                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" type="text" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td>
                                      <label>In Patient ID*</label>
                                      <input wire:model="form.in_patient_id" type="text" class="form-control" placeholder="In Patient ID">
                                    </td>
                                    <td>
                                      <label>Admission Date*</label>
                                      <input wire:model="form.admission_date" type="date" class="form-control" placeholder="Admission Date">
                                    </td>
                                  </tr> 
                                </tbody>
                              </table>
                            </div>

                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="5" class="text-center">Sensory Observations</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="5">
                                      <label>Left</label>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      <label>L1*</label>
                                      <input wire:model="form.lL1" type="text" class="form-control" placeholder="Left-L1" >
                                    </td>
                                    <td>
                                      <label>L2*</label>
                                      <input wire:model="form.lL2" type="text" class="form-control" placeholder="Left-L2" >
                                    </td>
                                    <td>
                                      <label>L3*</label>
                                      <input wire:model="form.lL3" type="text" class="form-control" placeholder="Left-L3" >
                                    </td>

                                    <td>
                                      <label>L4*</label>
                                      <input wire:model="form.lL4" type="text" class="form-control" placeholder="Left-L4" >
                                    </td>
                                    <td>
                                      <label>L5*</label>
                                      <input wire:model="form.lL5" type="text" class="form-control" placeholder="Left-L5" >
                                    </td>
                                  </tr>

                                  <tr>   
                                    <td>
                                      <label>S1*</label>
                                      <input wire:model="form.lS1" type="text" class="form-control" placeholder="Left-S1">
                                    </td>    
                                  </tr>       
                                  
                                  <tr>
                                    <td colspan="5">
                                      <label>Right</label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>L1*</label>
                                      <input wire:model.defer="form.rL1" type="text"  class="form-control" placeholder="Right-L1">
                                    </td>
                                    <td>
                                      <label>L2*</label>
                                      <input wire:model.defer="form.rL2" type="text"  class="form-control" placeholder="Right-L2" >
                                    </td>
                                    <td>
                                      <label>L3*</label>
                                      <input wire:model.defer="form.rL3" type="text"  class="form-control" placeholder="Right-L3" >
                                    </td>
                                    <td>
                                      <label>L4*</label>
                                      <input wire:model.defer="form.rL4" type="text"  class="form-control" placeholder="Right-L4" >
                                    </td>
                                    <td>
                                      <label>L5*</label>
                                      <input wire:model.defer="form.rL5" type="text"  class="form-control" placeholder="Right-L5" >
                                    </td>                                    
                                  </tr>
                                  
                                  <tr>
                                    <td>
                                      <label>S1*</label>
                                      <input wire:model.defer="form.rS1" type="text"  class="form-control" placeholder="Right-S1" >
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
                                  <th colspan="2"></th>
                                </tr>
                                </thead>
                                <tbody>        
                                <tr>
                                  <td colspan="2">
                                  <label>Comment</label>
                                  <input wire:model.defer="form.comment_entered_by" type="text" class="form-control" placeholder="Description">
                                  </td>
                                </td>
                                <tr>
                                  <td>
                                  <label>Entered By</label>
                                  <input wire:model="form.entered_by" type="text" class="form-control" placeholder="Description">
                                  </td>
                                  <td>
                                  <label>Entry Date*</label>
                                  <input wire:model="form.entry_date" type="date" class="form-control" placeholder="Description">
                                  </td>
                                </tr>
                                </tbody>
                              </table>
                              
                              <button wire:click="fnEditSExamData()" class="btn btn-warning font-normal mt-3 rounded">EDIT SENSORY INFO</button>
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

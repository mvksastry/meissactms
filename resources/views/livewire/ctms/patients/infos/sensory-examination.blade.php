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
                <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Sensory Examinations - Dermatome Grades</h3>
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
                          <h3 class="card-title p-3">Guide Image x</h3>
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
                                    <th colspan="3" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>Opd ID*</label>
                                      </br>{{  $sensoryexam_info->opd_id }}
                                    </td>
                                    <td>
                                      <label>In Patient ID*</label>
                                      </br>{{  $sensoryexam_info->opd_id }}
                                    </td>
                                    <td>
                                      <label>Admission Date*</label>
                                      </br>{{  $sensoryexam_info->opd_id }}
                                     </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>


                            <div class="tab-pane" id="tab_2">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th colspan="5" align="center">Sensory Observations</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td>
                                      <label>S1*</label>
                                      </br>{{ $sensoryexam_info->S1 }}
                                    </td>
                                    <!--
                                    <td>
                                      <label>S2*</label>
                                      <input wire:model.defer="form.s2" id="s2" type="text" value="null" class="form-control" placeholder="S2">
                                    </td>
                                    <td>
                                      <label>S3*</label>
                                      <input wire:model.defer="form.s3" id="s3" type="text" value="null" class="form-control" placeholder="S3" >
                                    </td>
                                    <td>
                                      <label>S4*</label>
                                      <input wire:model.defer="form.s4" id="s4" type="text" value="null" class="form-control" placeholder="S4" >
                                    </td>
                                    <td>
                                      <label>S5*</label>
                                      <input wire:model.defer="form.s5" id="s5" type="text" value="null" class="form-control" placeholder="S5" >
                                    </td>
                                    -->
                                  </tr>
                                  <!--
                                  <tr>
                                    <td>
                                      <label>S6*</label>
                                      <input wire:model.defer="form.s6" id="s6" type="text" value="null" class="form-control" placeholder="S6" >
                                    </td>
                                    
                                    <td>
                                      <label>S7*</label>
                                      <input wire:model.defer="form.s7" id="s7" type="text" value="null" class="form-control" placeholder="S7" >
                                    </td>
                                    <td>
                                      <label>S8*</label>
                                      <input wire:model.defer="form.s8" id="s8" type="text" value="null" class="form-control" placeholder="S8" >
                                    </td>
                                    <td>
                                      <label>S9*</label>
                                      <input wire:model.defer="form.s9" id="s9" type="text" value="null" class="form-control" placeholder="S9" >
                                    </td>
                                    <td>
                                      <label>S10*</label>
                                      <input wire:model.defer="form.s10" id="s10" type="text" value="null" class="form-control" placeholder="S10" >
                                    </td>
                                  </tr>
                                  -->
                                  <!--
                                  <tr>
                                    <td>
                                      <label>T08*</label>
                                      <input wire:model.defer="form.t08" id="t08" type="text" value="null" class="form-control" placeholder="T08" >
                                    </td>
                                    <td>
                                      <label>T09*</label>
                                      <input wire:model.defer="form.t09" id="t09" type="text" value="null" class="form-control" placeholder="T09" >
                                    </td>
                                    <td>
                                      <label>T10*</label>
                                      <input wire:model.defer="form.t10" id="t10" type="text" value="null" class="form-control" placeholder="T10" >
                                    </td>
                                    <td>
                                      <label>T11*</label>
                                      <input wire:model.defer="form.t11" id="t11" type="text" value="null" class="form-control" placeholder="T11" >
                                    </td>
                                    <td>
                                      <label>T12*</label>
                                      <input wire:model.defer="form.t12" id="t12" type="text" value="null" class="form-control" placeholder="T12" >
                                    </td>
                                  </tr>
                                  -->
                                  <tr>
                                    <td>
                                      <label>L1*</label>
                                      </br>{{ $sensoryexam_info->L1 }}
                                     </td>
                                    <td>
                                      <label>L2*</label>
                                      </br>{{ $sensoryexam_info->L2 }}
                                    </td>
                                    <td>
                                      <label>L3*</label>
                                      </br>{{ $sensoryexam_info->L3 }}
                                    </td>
                                    <td>
                                      <label>L4*</label>
                                      </br>{{ $sensoryexam_info->L4 }}
                                    </td>
                                    <td>
                                      <label>L5*</label>
                                      </br>{{ $sensoryexam_info->L5 }}
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
                                    <th colspan="2" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment By Entered</label>
                                      </br>{{ $vascore_info->comment_entered_by }}
                                    </td>
                                  </tr>
                                  <tr>                                    
                                    <td colspan="1">
                                      <label>Entered By*</label>
                                      </br>{{ $sensoryexam_info->entered_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Entry Date*</label>
                                      </br>{{ $sensoryexam_info->entry_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment by Verified</label>
                                      </br>{{ $vascore_info->comment_verified_by }}
                                    </td>
                                  </tr>
                                  <tr>                                    
                                    <td colspan="1">
                                      <label>Verified By*</label>
                                      </br>{{ $sensoryexam_info->verified_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Verified Date*</label>
                                      </br>{{ $sensoryexam_info->verified_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment by Sealed Authority</label>
                                      </br>{{ $vascore_info->comment_sealed_by }}
                                    </td>
                                  </tr>
                                  <tr>                                     
                                    <td colspan="1">
                                      <label>Entry Sealed By*</label>
                                      </br>{{ $sensoryexam_info->entry_sealed_by }}
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      </br>{{ $sensoryexam_info->entry_sealed_date }}
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              
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

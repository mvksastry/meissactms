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
                                    <td colspan="5">
                                      <label>Left</label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>L1*</label>
                                      </br>{{ $sensoryexam_info->lL1 }}
                                     </td>
                                    <td>
                                      <label>L2*</label>
                                      </br>{{ $sensoryexam_info->lL2 }}
                                    </td>
                                    <td>
                                      <label>L3*</label>
                                      </br>{{ $sensoryexam_info->lL3 }}
                                    </td>
                                    <td>
                                      <label>L4*</label>
                                      </br>{{ $sensoryexam_info->lL4 }}
                                    </td>
                                    <td>
                                      <label>L5*</label>
                                      </br>{{ $sensoryexam_info->lL5 }}
                                     </td>
                                    <tr>
                                      <td>
                                        <label>S1*</label>
                                        </br>{{ $sensoryexam_info->lS1 }}
                                      </td>
                                    </tr>
                                  </tr>    
                                  <tr>
                                    <td colspan="5">
                                      <label>Right</label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>S1*</label>
                                      </br>{{ $sensoryexam_info->rS1 }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>L1*</label>
                                      </br>{{ $sensoryexam_info->rL1 }}
                                     </td>
                                    <td>
                                      <label>L2*</label>
                                      </br>{{ $sensoryexam_info->rL2 }}
                                    </td>
                                    <td>
                                      <label>L3*</label>
                                      </br>{{ $sensoryexam_info->rL3 }}
                                    </td>
                                    <td>
                                      <label>L4*</label>
                                      </br>{{ $sensoryexam_info->rL4 }}
                                    </td>
                                    <td>
                                      <label>L5*</label>
                                      </br>{{ $sensoryexam_info->rL5 }}
                                     </td>
                                    <tr>
                                      <td>
                                        <label>S1*</label>
                                        </br>{{ $sensoryexam_info->rS1 }}
                                      </td>
                                    </tr>
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
                                      </br>{{ $sensoryexam_info->comment_entered_by }}
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
                                      </br>{{ $sensoryexam_info->comment_verified_by }}
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
                                      </br>{{ $sensoryexam_info->comment_sealed_by }}
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

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
                                      </br>{{  $clinical_info->opd_id }}
                                    </td>
                                    <td>
                                      <label>In Patient ID*</label>
                                      </br>{{  $clinical_info->opd_id }}
                                    </td>
                                    <td>
                                      <label>Admission Date*</label>
                                      </br>{{  $clinical_info->opd_id }}
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
                                        </br>{{  $clinical_info->o_e }}
                                     </td>
                                    <td>
                                      <label>PR*</label>
                                        </br>{{  $clinical_info->pr }}
                                     </td>
                                    <td>
                                      <label>Temperature*</label>
                                      </br>{{  $clinical_info->temperature }}
                                     </td>
                                    <td>
                                      <label>BP-Systolic*</label>
                                      </br>{{  $clinical_info->bp_systolic }}
                                     </td>
                                    <td>
                                      <label>BP-Diastolic*</label>
                                      </br>{{  $clinical_info->bp_diastolic }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>CVS*</label>
                                      </br>{{  $clinical_info->cvs }}
                                     </td>

                                    <td>
                                      <label>P/A*</label>
                                      </br>{{  $clinical_info->p_a }}
                                    </td>
                                    <td>
                                      <label>CNS*</label>
                                      </br>{{  $clinical_info->cns }}
                                    </td>
                                    <td>
                                      <label>CBC*</label>
                                      </br>{{  $clinical_info->cbc }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>ESR*</label>
                                      </br>{{  $clinical_info->esr }}
                                    </td>
                                    <td>
                                      <label>CRP*</label>
                                      </br>{{  $clinical_info->crp }}
                                    </td>
                                    <td>
                                      <label>RFT*</label>
                                      </br>{{  $clinical_info->rft }}
                                    </td>
                                    <td>
                                      <label>LFT*</label>
                                      </br>{{  $clinical_info->lft }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Clotting Time*</label>
                                      </br>{{  $clinical_info->clotting_time }}
                                    </td>
                                    <td>
                                      <label>Bleeding Time*</label>
                                      </br>{{  $clinical_info->bleeding_time }}
                                    </td>
                                    <td>
                                      <label>Prothrombin time*</label>
                                      </br>{{  $clinical_info->prothrombin_time }}
                                    </td>

                                    <td>
                                      <label>Procalcitonin*</label>
                                      </br>{{  $clinical_info->procalcitonin }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="6">
                                      <label>Laboratory Report File*</label>
                                      </br>{{  $clinical_info->lab_report_file }}
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
                                    <th colspan="2" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody>        
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment by Entered</label>
                                      </br>{{ $clinical_info->comment_entered_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Entered By*</label>
                                      </br>{{ $clinical_info->entered_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Entry Date*</label>
                                      </br>{{ $clinical_info->entry_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment By Verified</label>
                                      </br>{{ $clinical_info->comment_verified_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Verified By*</label>
                                      </br>{{ $clinical_info->verified_by }}
                                    </td>
                                    <td>
                                      <label>Verified Date*</label>
                                      </br>{{ $clinical_info->verified_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment By Sealed Authority</label>
                                      </br>{{ $clinical_info->comment_sealed_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Entry Sealed By*</label>
                                      </br>{{ $clinical_info->entry_sealed_by }}
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      </br>{{ $clinical_info->entry_sealed_date }}
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

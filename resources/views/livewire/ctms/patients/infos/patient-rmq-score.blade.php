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
                  RMQ: Roland Morris Low Back Pain and Disability Questionnaire Score
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
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">RMQ</a></li>
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
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                    </br>
                                      {{ $rmq_replies->opd_id }}
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      </br>
                                      {{ $rmq_replies->in_patient_id }}
                                    </td>
                                    <td colspan="1">
                                      <label>Admission Date*</label>
                                      </br>
                                      {{ $rmq_replies->admission_date }}
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
                                  <?php
                                    $replies_rmq = json_decode($rmq_replies->rmq_replies);
                                  ?>
                                  @foreach($replies_rmq as $row)
                                  <tr>
                                    <td>
                                      <div class="form-check">
                                        {{  $row }} -- {{ $rmqreplies[$row] }}
                                      </div>
                                    </td>
                                  </tr>
                                  @endforeach                                    
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
                                      <label>Entered By Entered</label>
                                      </br>{{ $rmq_replies->comment_entered_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Entered By*</label>
                                      </br>{{ $rmq_replies->entered_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Entry Date*</label>
                                      </br>{{ $rmq_replies->entry_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Verified By Verified</label>
                                      </br>{{ $rmq_replies->comment_verified_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Verified By*</label>
                                      </br>{{ $rmq_replies->verified_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Verified Date*</label>
                                      </br>{{ $rmq_replies->verified_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Verified By Sealed Authority</label>
                                      </br>{{ $rmq_replies->comment_verified_by }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <label>Entry Sealed By*</label>
                                      </br>{{ $rmq_replies->entry_sealed_by }}
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      </br>{{ $rmq_replies->entry_sealed_date }}
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

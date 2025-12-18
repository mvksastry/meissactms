 <?php


?>
 
 
 
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
                  Form 1: Clinical Evaluation  Modified Oswestry Disability Questionnaire
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
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">MODI Questionare</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Clinical</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Official</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">

                            <!-- /.tab-pane -->
                            <div class="tab-pane active" id="tab_1">
                              <div class="form-group">
                                <label>Pain Intensity</label>
                                <div class="form-check">
                                  @if($modq_info->pain_intensity !=  null)
                                  {{ $modq_info->pain_intensity }} -- {{ $painIntensity[$modq_info->pain_intensity] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Personal Care (eg. Washing, Dressing )</label>
                                <div class="form-check">
                                  @if($modq_info->personal_care !=  null)
                                  {{ $modq_info->personal_care }} -- {{ $persCare[$modq_info->personal_care] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Lifting</label>
                                <div class="form-check">
                                  @if($modq_info->lifting !=  null)
                                  {{ $modq_info->lifting }} -- {{ $modq_lifting[$modq_info->lifting] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Walking</label>
                                <div class="form-check">
                                  @if($modq_info->walking !=  null)
                                  {{ $modq_info->walking }} -- {{ $modq_walking[$modq_info->walking] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Sitting</label>
                                <div class="form-check">
                                  @if($modq_info->sitting !=  null)
                                  {{ $modq_info->sitting }} -- {{ $modq_sitting[$modq_info->sitting] }}
                                  @endif
                               </div>
                              </div>

                              <div class="form-group">
                                 <label>Standing</label>
                                <div class="form-check">
                                  @if($modq_info->standing !=  null)
                                  {{ $modq_info->standing }} -- {{ $modq_standing[$modq_info->standing] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Sleeping</label>
                                <div class="form-check">
                                  @if($modq_info->sleeping !=  null)
                                  {{ $modq_info->sleeping }} -- {{ $modq_sleeping[$modq_info->sleeping] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Social Life</label>
                                <div class="form-check">
                                   @if($modq_info->social_life !=  null)
                                  {{ $modq_info->social_life }} -- {{ $modq_sociallife[$modq_info->social_life] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Travelling</label>
                                <div class="form-check">
                                  @if($modq_info->travelling  !=  null)
                                  {{ $modq_info->travelling }} -- {{ $modq_travelling[$modq_info->travelling] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Employment & Home Making</label>
                                <div class="form-check">
                                   @if($modq_info->employment_home_making  !=  null)
                                  {{ $modq_info->employment_home_making }} -- {{ $modq_emphome[$modq_info->employment_home_making] }}
                                  @endif
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Total Score -- In %</label>
                                <div class="form-check">
                                  {{ $modq_info->total }} -- {{ $modq_info->modq_score }}%
                                </div>
                              </div>
                            </div>
                            <!-- /.tab-pane -->
                            

                            <div class="tab-pane" id="tab_2">
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
                                      {{ $modq_info->opd_id }}
                                      
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      </br>
                                      {{ $modq_info->in_patient_id }}
                          
                                    </td>
                                    <td colspan="1">
                                      <label>Admission Date*</label>
                                      </br>
                                      {{ $modq_info->admission_date }}
                                    </td>
                                  </tr> 
                                </tbody>
                              </table>
                            </div>                           
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
                                      </br>{{ $modq_info->comment_entered_by }}
                                    </td>
                                  </tr>
                                  <tr>                                    
                                    <td colspan="1">
                                      <label>Entered By*</label>
                                      </br>{{ $modq_info->entered_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Entry Date*</label>
                                      </br>{{ $modq_info->entry_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment by Verified</label>
                                      </br>{{ $modq_info->comment_verified_by }}
                                    </td>
                                  </tr>
                                  <tr>                                    
                                    <td colspan="1">
                                      <label>Verified By*</label>
                                      </br>{{ $modq_info->verified_by }}
                                    </td>
                                    <td colspan="1">
                                      <label>Verified Date*</label>
                                      </br>{{ $modq_info->verified_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <label>Comment by Sealed Authority</label>
                                      </br>{{ $modq_info->comment_sealed_by }}
                                    </td>
                                  </tr>
                                  <tr>                                     
                                    <td colspan="1">
                                      <label>Entry Sealed By*</label>
                                      </br>{{ $modq_info->entry_sealed_by }}
                                    </td>
                                    <td colspan="2">
                                      <label>Sealed Date*</label>
                                      </br>{{ $modq_info->entry_sealed_date }}
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

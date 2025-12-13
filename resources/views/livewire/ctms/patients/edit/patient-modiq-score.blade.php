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
                  Form 1: Clinical Evaluation – Modified Oswestry Disability Questionnaire
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
                                  {{ $modq_info->pain_intensity }} -- {{ $painIntensity[$modq_info->pain_intensity] }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label>Personal Care (eg. Washing, Dressing )</label>
                                <div class="form-check">
                                  {{ $modq_info->personal_care }} -- {{ $persCare[$modq_info->personal_care] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Lifting</label>
                                <div class="form-check">
                                  {{ $modq_info->lifting }} -- {{ $modq_lifting[$modq_info->lifting] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Walking</label>
                                <div class="form-check">
                                  {{ $modq_info->walking }} -- {{ $modq_walking[$modq_info->walking] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Sitting</label>
                                <div class="form-check">
                                  {{ $modq_info->sitting }} -- {{ $modq_sitting[$modq_info->sitting] }}
                               </div>
                              </div>

                              <div class="form-group">
                                 <label>Standing</label>
                                <div class="form-check">
                                  {{ $modq_info->standing }} -- {{ $modq_standing[$modq_info->standing] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Sleeping</label>
                                <div class="form-check">
                                  {{ $modq_info->sleeping }} -- {{ $modq_sleeping[$modq_info->sleeping] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Social Life</label>
                                <div class="form-check">
                                  {{ $modq_info->social_life }} -- {{ $modq_sociallife[$modq_info->social_life] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Travelling</label>
                                <div class="form-check">
                                  {{ $modq_info->travelling }} -- {{ $modq_travelling[$modq_info->travelling] }}
                                </div>
                              </div>

                              <div class="form-group">
                                 <label>Employment & Home Making</label>
                                <div class="form-check">
                                  {{ $modq_info->employment_home_making }} -- {{ $modq_emphome[$modq_info->employment_home_making] }}
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
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" id="opd_id" type="text" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" type="text" class="form-control">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" type="date" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                  <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" id="admission_date" type="date" value="null" class="form-control" placeholder="Aadhar ID">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Date*</label>
                                      <input wire:model.defer="form.pan_num" id="pan_num" type="text" value="null" class="form-control" placeholder="PAN">
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td colspan="1">
                                      <label>Discharge Report File*</label>
                                      <input wire:model.defer="form.dicharge_rep_file" id="dicharge_rep_file" type="text" value="null" class="form-control" placeholder="Other ID" >
                                    </td>
                                  </tr>  
                                </tbody>
                              </table>
                            </div>                           
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
            </div>
          </section>
        </div> 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

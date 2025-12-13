<div>
    {{-- The best athlete wants his opponent at his best. --}}

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
                  RMQ: Roland Morris Low Back Pain and Disability Questionnaire Score: Date Created: {{ $rmq_reply->created_at }}
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
                                    <th colspan="4" align="center"></th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td colspan="1">
                                      <label>Opd ID*</label>
                                      <input wire:model="form.opd_id" id="opd_id" value="{{ $rmq_reply->opd_id }}" type="text" class="form-control" placeholder="Out Patient ID">
                                    </td>
                                    <td colspan="1">
                                      <label>In Patient ID*</label>
                                      <input wire:model.defer="form.in_patient_id" id="in_patient_id" value="{{ $rmq_reply->in_patient_id }}" type="text" class="form-control">
                                    </td>
                                    <td colspan="1">
                                      <label>Investigation Report Date*</label>
                                      <input wire:model="form.report_date" id="report_date" value="{{ $rmq_reply->report_date }}" type="date" class="form-control" placeholder="Report Date">
                                    </td>
                                  </tr>
                                  <tr>
                                  <td colspan="1">
                                      <label>Admission Date*</label>
                                      <input wire:model.defer="form.admission_date" id="admission_date" value="{{ $rmq_reply->admission_date }}" type="date" class="form-control" placeholder="Aadhar ID">
                                    </td>
                                    <td colspan="1">
                                      <label>PAN*</label>
                                      <input wire:model.defer="form.pan_num" id="pan_num" type="text" value="{{ $rmq_reply->pan_num }}"  class="form-control" placeholder="PAN">
                                    </td>
                                    <td colspan="1">
                                      <label>Aadhar ID*</label>
                                      <input wire:model.defer="form.aadhar_id" id="aadhar_id" type="text" value="{{ $rmq_reply->aadhar_id }}"  class="form-control" placeholder="Other ID" >
                                    </td>
                                    <td colspan="1">
                                      <label>Other ID*</label>
                                      <input wire:model.defer="form.other_id" id="other_id" type="text" value="{{ $rmq_reply->other_id }}"  class="form-control" placeholder="Other ID" >
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
                                  @foreach($rmquestions as $row)
                                  <tr>
                                    <td>
                                      <div class="form-check">
                                        <input class="form-check-input" wire:model="rmq_replies" value="{{ $row->rmquestion_id }}" type="checkbox">
                                        <label class="form-check-label"> {{ $row->question }}</label>
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
                                        <th colspan="3" align="center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>        
                                    <tr>
                                        <td colspan="1">
                                        <label>Entered By*</label>
                                        <input wire:model="form.entered_by" id="entered_by" value="{{ $rmq_reply->entered_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date*</label>
                                        <input wire:model="form.entry_date" id="entry_date" value="{{ $rmq_reply->entry_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Verified By*</label>
                                        <input wire:model.defer="form.verified_by" id="consumption_gutka" value="{{ $rmq_reply->verified_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="1">
                                        <label>Verified Date*</label>
                                        <input wire:model.defer="form.verified_date" id="consumption_gutka" value="{{ $rmq_reply->verified_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Entry Sealed By*</label>
                                        <input wire:model="form.entry_sealed_by" id="entry_sealed_by" value="{{ $rmq_reply->sealed_by }}" type="text" value="null" class="form-control" placeholder="Description">
                                        </td>
                                        <td colspan="2">
                                        <label>Sealed Date*</label>
                                        <input wire:model="form.entry_sealed_date" id="entry_sealed_date" value="{{ $rmq_reply->sealed_date }}" type="date" value="null" class="form-control" placeholder="Description">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                              
                              <button wire:click="fnSaveRMQInfo()" class="btn btn-success text-white font-normal mt-3 rounded">ADD RMQ INFO</button>
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

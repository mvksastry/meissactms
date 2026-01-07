<div>
    {{-- In work, do what you enjoy. --}}
 {{-- The whole world belongs to you. --}}
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home Non Conformities : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home N C</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="row">
          @include('livewire.qms.n-c.nc-flex-menu')
        </div>
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Home Non Conformities
            </h3>
          </div>
          <div class="card-body">
            @if($sys_panel)
              @include('livewire.eac_sys_panel')
            @endif
            @if($msg_panel)
              @include('livewire.eac_msg_panel')
            @endif
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">
              <div class="col-sm-4 col-md-2">
                <button wire:click="fnNewNC()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp New NC</button>
              </div>
              @if($edit_button)
                <div class="col-sm-4 col-md-2">
                  <button wire:click="fnRedirectToEdit()" type="button" class="btn btn-block btn-warning"><i class="ion ion-person"></i>&nbsp Edit Patients</button>
                </div>
              @endif
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            <div class="row">
              <label class="form-class" for="sampdesc">List of Non Conformities</label>
              </br>
              @if(!empty($activeNcs))
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                      <th>origin_of_nc</th>
                      <th>division_reported</th>
                      <th>raised_by</th>
                      <th>raised_role</th>
                      <th>assigned_division</th>
                      <th>description</th> 
                      <th>current_status</th>                      
                  </tr>
                </thead>
                <tbody> 
                  @foreach($activeNcs as $row)
                    <tr>
                        <td>{{ $row->origin_of_nc }}</td>
                        <td>{{ $row->division_reported }}</td>
                        <td>{{ $row->raised_by }}</td>
                        <td>{{ $row->raised_role }}</td>
                        <td>{{ $row->assigned_division }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->current_status }}</td>
                        <td>
                            <button wire:click="fnNCDetails('{{ $row->nc_id }}')" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp NC Details</button>
                        </td>
                    </tr>  
                  @endforeach                                  
                </tbody>
              </table>
              @else
              <label class="form-class" for="sampdesc">No Non Conformities Found</label>
              @endif
            </div>

            <div class="row">
              <label class="form-class" for="sampdesc">Acknowledgements</label>
              </br>
              @if(!empty($nc_acks))
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                      <th>ack_by</th>
                      <th>ack_at</th>
                      <th>remarks</th>
                      <th>entered_by</th>
                      <th>entered_role</th>
                      <th>created_at</th> 
                      <th>updated_at</th> 
                      <th>Action</th>                      
                  </tr>
                </thead>
                <tbody> 
                  @foreach($nc_acks as $row)
                    <tr>
                        <td>{{ $row->ack_by }}</td>
                        <td>{{ $row->ack_at }}</td>
                        <td>{{ $row->remarks }}</td>
                        <td>{{ $row->entered_by }}</td>
                        <td>{{ $row->entered_role }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
                        <td></td>
      
                    </tr>  
                  @endforeach                                  
                </tbody>
              </table>
              @else
              <label class="form-class" for="sampdesc">No Acknowledgements Found</label>
              @endif
            </div>

            <div class="row">
              <label class="form-class" for="sampdesc">Communications</label>
              </br>
              @if(!empty($nc_communs) )
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>message_type</th>
                        <th>message</th>
                        <th>entered_by</th>
                        <th>entered-role</th>
                        <th>visible_to</th>
                        <th>created_at</th> 
                        <th>updated_at</th>                      
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($nc_communs as $row)
                      <tr>
                          <td>{{ $row->message_type }}</td>
                          <td>{{ $row->message }}</td>
                          <td>{{ $row->entered_by }}</td>
                          <td>{{ $row->entered-role }}</td>
                          <td>{{ $row->visible_to }}</td>
                          <td>{{ $row->created_at }}</td>
                          <td>{{ $row->updated_at}}</td>
                      </tr>  
                    @endforeach                                  
                  </tbody>
                </table>
              @else
              <label class="form-class" for="sampdesc">No Communications Found</label>
              @endif
            </div>


            <div class="row">
              <label class="form-class" for="sampdesc">Reviews</label>
              </br>
              @if(!empty($nc_review) )
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>review_stage</th>
                        <th>summary</th>
                        <th>capa_required</th>
                        <th>reviewed_by </br> reviewed_at</th>
                        <th>locked </br> locked_by </br> locked_on</th> 
                        <th>created_at</th>  
                        <th>Updated_at</th>                    
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($nc_review as $row)
                      <tr>
                          <td>{{ $row->review_stage }}</td>
                          <td>{{ $row->summary }}</td>
                          <td>{{ $row->capa_required }}</td>
                          <td>{{ $row->reviewed_by }} </br> {{ $row->reviewed_at }}</td>
                          <td>{{ $row->locked }}</br>{{ $row->locked_by }}</br>{{ $row->locked_on }}</td>
                          <td>{{ $row->created_at }}</td>
                          <td>{{ $row->Updated_at }}</td>
                      </tr>  
                    @endforeach                                  
                  </tbody>
                </table>
              @else
                <label class="form-class" for="sampdesc">No Reviews Found</label>
              @endif
              
            </div>

            <div class="row">
              <label class="form-class" for="sampdesc">Status History</label>
              </br>
              @if(!empty($nc_history))
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                      <th>from_status</th>
                      <th>to_status</th>
                      <th>changed_by</th>
                      <th>change_reason</th>
                      <th>created_at</th>
                      <th>updated_at</th>                   
                  </tr>
                </thead>
                <tbody> 
                  @foreach($nc_history as $row)
                    <tr>
                        <td>{{ $row->from_status }}</td>
                        <td>{{ $row->to_status }}</td>
                        <td>{{ $row->changed_by }}</td>
                        <td>{{ $row->change_reason }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
                    </tr>  
                  @endforeach                                  
                </tbody>
              </table>
              @else
              <label class="form-class" for="sampdesc">NC Status History Not Found</label>
              @endif
            </div>

            <div class="row">
              <label class="form-class" for="sampdesc">Audit Logs</label>
            </br>
              @if(!empty($nc_auditLogs))
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                      <th>record_type</th>
                      <th>action</th>
                      <th>old_value</th>
                      <th>new_value</th>
                      <th>created_at</th>
                      <th>updated_at</th>                     
                  </tr>
                </thead>
                <tbody> 
                  @foreach($nc_auditLogs as $row)
                    <tr>
                        <td>{{ $row->record_type }}</td>
                        <td>{{ $row->action }}</td>
                        <td>{{ $row->old_value }}</td>
                        <td>{{ $row->new_value }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
                    </tr>  
                  @endforeach                                  
                </tbody>
              </table>
              @else
              <label class="form-class" for="sampdesc">Audit Logs Not Found</label>
              @endif
            </div>

            @if($newNCEntrySteps)
              <div class="row">
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnShowPrimaryInfoForm()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Primary Infos</button>
                </div>
                <!-- /.col -->
                @if($openAllOtherForms)
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnLifeStyle()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Life Style</button>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnClinicalInvestigations()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Clinical</button>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnSensoryExaminations()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Sensory Exams</button>  
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnMDTRExaminations()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp M & DTR Exams</button>    
                  </div>
                @endif
              </div>
              </br>
              
              <div class="row">
                <!-- /.col -->
                @if($openAllOtherForms)
                  <!--
                  <div class="col-sm-3 col-md-2">
                    <button  type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Radiographs</button>
                  </div>
                  -->
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnModifiedPfirmannGrades()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Pfirmann’s Grade</button>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnVisualAnalogScore()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Visual Analog Score</button>  
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnMODIQScore()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp MODQ Score</button>  
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-md-2">
                    <button wire:click="fnRMQScore()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp RMQ Score</button>    
                  </div>
                @endif
                <!-- /.col -->
              </div>

              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->

              <!--/ Divider-->
              </br>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @if($p1)
      <livewire:qms.n-c.non-conformity-incidences :nc_id="$nc_id" :entry="$entry" />
    @endif

    @if($p2)
      <livewire:qms.n-c.nc-acknowledges :nc_id="$nc_id" :entry="$entry" />
    @endif

    @if($p3)
      <livewire:qms.n-c.nc-comms :nc_id="$nc_id" :entry="$entry" />
    @endif
    
    @if($p4)
      <livewire:qms.n-c.nc-reviews :nc_id="$nc_id" :entry="$entry" />
    @endif

    @if($p5)
      <livewire:qms.n-c.nc-status-history-logs :nc_id="$nc_id" :entry="$entry" />
    @endif

    @if($p6)
      <livewire:qms.n-c.nc-audit-logs :nc_id="$nc_id" :entry="$entry" />
    @endif

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

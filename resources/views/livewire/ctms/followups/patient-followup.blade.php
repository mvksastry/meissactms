<div>
 {{-- The whole world belongs to you. --}}
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Patients : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patients-Followup</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Follow-up Patient Management Options
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
            <div class="row">
              @if(count($draftPatients) > 0)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                      <tr>
                        <th>Center</th>
                        <th>Clinic</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Details</th>
                      </tr>
                  </thead>
                  <tbody> 
                    @foreach($draftPatients as $row)
                      <tr>
                        <td>
                            {{ $row->center_id }}
                        </td>
                        <td>
                            {{ $row->ctarm_id }}
                        </td>
                        <td>
                            {{ $row->name }}
                        </td>
                        <td>
                            {{ $row->gender }}
                        </td>
                        <td>
                            {{ ucfirst($row->status) }}
                        </td>
                        <td>
                            <button wire:click="selectedPatient('{{ $row->patient_uuid}}')" class="btn btn-block btn-light rounded" type="button" ><i class="ion ion-person"></i>&nbsp ADD FOLLOW-UP DETAILS</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else 
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                      <tr>
                      <th>No Information to display</th>
                      </tr>
                  </thead>
                </table>
              @endif
            </div>
            <!-- /.col-12 -->

            
            @if($patientInfoButtons)
              <div class="row">
                <div class="col-sm-3 col-md-2">
                  <button disabled wire:click="fnShowPrimaryInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Primary Infos</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFULifeStyleData('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Life Style</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUClinicalInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Clinical</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUSensoryExamInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Sensory Exam</button>  
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUMDTRExamInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp M&DTR Exam</button>    
                </div>
              </div>
              </br>
              <div class="row">
                <!-- /.col -->
              
                <div class="col-sm-3 col-md-2">
                  <button  wire:click="fnFUPatientReportUploads('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Reports</button>
                </div>
              
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUModifiedPfirmannInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Pfirmann’s Grade</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUVisualAnalogInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp Vis. Analog Score</button>  
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFUMODIQInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp MODQ Score</button>  
                </div>
              
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnFURMQInfo('{{ $patient_uuid }}')" type="button" class="btn btn-block btn-light"><i class="ion ion-person"></i>&nbsp RMQ Score</button>    
                </div>
                <!-- /.col -->
                <!--
                -->
              </div>
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->

              <!--/ Divider-->
              </br>
            @endif
            
            
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    @if($p1)
      <livewire:ctms.patients.patient-personal :data_type="$data_type" :entered_by="$entered_by" :entry="$entry" />
    @endif

    @if($p2)
      <livewire:ctms.followups.followup-life-style :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif
    
    @if($p3)
      <livewire:ctms.followups.followup-clinical-investigations :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    @if($p4)
      <livewire:ctms.followups.followup-sensory-exams :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    @if($p5)
      <livewire:ctms.followups.followup-m-d-t-r-exams :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    @if($p6)
      <livewire:ctms.followups.followup-report-files :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    @if($p7)
      <livewire:ctms.followups.followup-modified-pfirmanns :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    @if($p8)
      <livewire:ctms.followups.followup-visual-analogs :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    @if($p9) 
      <livewire:ctms.followups.followup-modiq-scores :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif
    
    @if($p10)
      <livewire:ctms.followups.followup-rmq-scores :data_type="$data_type" :patient_uuid="$patient_uuid" :entry="$entry" />
    @endif

    


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>




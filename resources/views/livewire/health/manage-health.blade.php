<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    {{-- The whole world belongs to you. --}}
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Health : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Health</li>
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
              Patient Management Options
            </h3>
          </div>
          <div class="card-body">
            @if($message_panel)
              @include('livewire.error-alerts-callouts')
            @endif
            <!-- /.col-12 -->
            <div class="row">
                @if(count($activePatients) > 0)
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
                        @foreach($activePatients as $row)
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
                                    <button wire:click="selectedPatient('{{ $row->patient_uuid}}')" class="btn btn-block btn-info rounded" type="button" ><i class="ion ion-person"></i>&nbsp Details</button>
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
            <div class="row">
                <!--
                <div class="col-sm-4 col-md-2">
                    <button type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp New Patient</button>
                </div>
              
                <div class="col-sm-4 col-md-2">
                  <button type="button" class="btn btn-block btn-warning"><i class="ion ion-person"></i>&nbsp Edit Patients</button>
                </div>
                -->
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            @if($healthInfoButtons)
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="background-color: #adb5bd;">
                        <h5 class="m-2"> Investigations : </h5>
                        <div class="row">
                            <div class="col-sm">
                                <button wire:click="fnHLifeStyle()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Life Style</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                                <button wire:click="fnHClinicInvest()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Clinical</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                                <button wire:click="fnHSensoryExam()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Sensory</button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                                <button wire:click="fnHMDTRExam()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp M & DTR</button>    
                            </div>
                        </div>
                    </div>                    
                    <div class="col-sm-6 col-md-6" style="background-color: #a0f1d8;">
                        <h5 class="m-2"> Clinical Investigations : </h5>
                        <div class="row">
                            <div class="col-sm">
                            <button wire:click="fnBlodRoutine()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Blood Rout</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnLLftElect()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp LFT/Elect</button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnRenFunct()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Ren Fnct</button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnBsCrpIl6()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp BS-CRP-IL6</button>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="background-color: #adb5bd;">
                        <hr class="border-b-2 border-warning my-2 mx-2">
                        <div class="row">
                            <!-- /.col -->
                            <!--
                            <div class="col-sm-3 col-md-2">
                            <button  type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Radiographs</button>
                            </div>
                            -->
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnHMPfGrade()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Pfirmann’s</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnHVAScore()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp VA Score</button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnHMODIQScore()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp MODQ Score</button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnHRMQScore()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp RMQ Score</button>    
                            </div>
                        </div>
                    </div>
                        <!-- /.col -->
                        <!--Divider-->
                        
                        <!--Divider-->
                        
                    <div class="col-sm-6 col-md-6" style="background-color: #a0f1d8;">
                        <hr class="border-b-2 border-warning my-2 mx-2">
                        <div class="row">
                            <div class="col-sm">
                            <button wire:click="fnPathLab()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp PLI</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnChemExam()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Chem Exam </button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnMicroExam()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Micro E </button>  
                            </div>
                            <!-- /.col -->
                            <div class="col-sm">
                            <button wire:click="fnUrineRoutine()" type="button" class="btn btn-block btn-info"><i class="ion ion-person"></i>&nbsp Urine Rout</button>    
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--/ Divider-->
            <!--/ Divider-->
            </br>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @if($p1)
      <livewire:ctms.patients.patient-life-style :patient_uuid="$patient_uuid" />
    @endif
    @if($p2)
      <livewire:ctms.patients.patient-clinical-investigations :patient_uuid="$patient_uuid" />
    @endif
    @if($p3)
      <livewire:ctms.patients.sensory-examination :patient_uuid="$patient_uuid" />
    @endif
    @if($p4)
      <livewire:ctms.patients.patient-mdtre :patient_uuid="$patient_uuid" />
    @endif
    @if($p5)
      <livewire:ctms.patients.patient-modified-pfirmann-grades :patient_uuid="$patient_uuid" />
    @endif
    @if($p6)
      <livewire:ctms.patients.patient-visual-analog-score :patient_uuid="$patient_uuid" />
    @endif
    @if($p7) 
      <livewire:ctms.patients.patient-modiq-score :patient_uuid="$patient_uuid" />
    @endif
    @if($p8)
      <livewire:ctms.patients.patient-rmq-score :patient_uuid="$patient_uuid" />
    @endif

    @if($p9)
      <livewire:ctms.patients.patient-radiography :patient_uuid="$patient_uuid" />
    @endif

    @if($p10)
      <livewire:ctms.patients.clinicals.blood-routine-component :patient_uuid="$patient_uuid" />
    @endif
    @if($p11)
      <livewire:ctms.patients.clinicals.liver-functions :patient_uuid="$patient_uuid" />
      <livewire:ctms.patients.clinicals.electrolyte-component :patient_uuid="$patient_uuid" />
    @endif
    @if($p12)
      <livewire:ctms.patients.clinicals.renal-function-component :patient_uuid="$patient_uuid" />
    @endif
    @if($p13)
      <livewire:ctms.patients.clinicals.blood-sugar-component :patient_uuid="$patient_uuid" />
      <livewire:ctms.patients.clinicals.crp-component :patient_uuid="$patient_uuid" />
      <livewire:ctms.patients.clinicals.il6-component :patient_uuid="$patient_uuid" />
    @endif
    @if($p14)
      <livewire:ctms.patients.clinicals.laboratory-exams :patient_uuid="$patient_uuid" />
    @endif
    @if($p15)
      <livewire:ctms.patients.clinicals.chemical-exam-component :patient_uuid="$patient_uuid" />
    @endif
    @if($p16)
      <livewire:ctms.patients.clinicals.microscopic-exams :patient_uuid="$patient_uuid" />
    @endif
    @if($p17)
      <livewire:ctms.patients.clinicals.urine-routine-component :patient_uuid="$patient_uuid" />
    @endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

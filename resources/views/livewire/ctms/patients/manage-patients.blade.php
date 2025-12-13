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
              <li class="breadcrumb-item active">Patients</li>
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
            <!-- /.col-12 -->
            <div class="row">
              <div class="col-sm-4 col-md-2">
                <button wire:click="fnNewPatientEntrySteps()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp New Patient</button>
              </div>
              <div class="col-sm-4 col-md-2">
                <button wire:click="fnRedirectToEdit()" type="button" class="btn btn-block btn-warning"><i class="ion ion-person"></i>&nbsp Edit Patients</button>
              </div>
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            @if($newPatientEntrySteps)
              <div class="row">
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnShowPrimaryInfoForm()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Primary Information</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnLifeStyle()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Life Style</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnClinicalInvestigations()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Clinical</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnSensoryExaminations()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Sensory Examination</button>  
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnMDTRExaminations()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp M & DTR Examination</button>    
                </div>
              </div>
              </br>
              <div class="row">
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnRadiographs()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Radiographs</button>
                </div>
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
                  <button wire:click="fnMODIQScore()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp MODIQ Score</button>  
                </div>
              
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnRMQScore()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp RMQ Score</button>    
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
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @if($openNewPatientEntryForm)
      <livewire:ctms.patients.patient-personal />
    @endif

    @if($openNewLifeStyleEntryForm)
      <livewire:ctms.patients.patient-life-style />
    @endif
    
    @if($openNewClinicalInvestigationsEntryForm)
      <livewire:ctms.patients.patient-clinical-investigations />
    @endif

    @if($openNewSensoryExaminationsEntryForm)
      <livewire:ctms.patients.sensory-examination />
    @endif

    @if($openMDTREExaminationsEntryForm)
      <livewire:ctms.patients.patient-mdtre />
    @endif

    @if($openRadiographsEntryForm)
      <livewire:ctms.patients.patient-radiography />
    @endif

    @if($openModifiedPfirmannGradesEntryForm)
      <livewire:ctms.patients.patient-modified-pfirmann-grades />
    @endif

    @if($openVisualAnalogScore)
      <livewire:ctms.patients.patient-visual-analog-score />
    @endif

    @if($openMODIQScoreEntryForm) 
      <livewire:ctms.patients.patient-modiq-score />
    @endif
    
    @if($openRMQScoreEntryForm)
      <livewire:ctms.patients.patient-rmq-score />
    @endif








    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>



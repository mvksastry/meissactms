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
              Patient Information
            </h3>
          </div>
          <div class="card-body">
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">
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
                                <button wire:click="selectedPatient('{{ $row->patient_uuid}}')" class="btn btn-block btn-success rounded" type="button" ><i class="ion ion-person"></i>&nbsp Details</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            @if($patientInfoButtons)
              <div class="row">
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnShowPrimaryInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Primary Information</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnLifeStyleData('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Life Style</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnClinicalInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Clinical</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnSensoryExamInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Sensory Examination</button>  
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnMDTRExamInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp M & DTR Examination</button>    
                </div>
              </div>
              </br>
              <div class="row">
                <!-- /.col -->
                <!--
                <div class="col-sm-3 col-md-2">
                  <button type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Radiographs</button>
                </div>
                -->
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnModifiedPfirmannInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Pfirmann’s Grade</button>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnVisualAnalogInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp Visual Analog Score</button>  
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnMODIQInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp MODQ Score</button>  
                </div>
              
                <!-- /.col -->
                <div class="col-sm-3 col-md-2">
                  <button wire:click="fnRMQInfo('{{ $patient_uuid}}')" type="button" class="btn btn-block btn-success"><i class="ion ion-person"></i>&nbsp RMQ Score</button>    
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
        @include('livewire.ctms.patients.infos.primary-info')
    @endif

    @if($openNewLifeStyleEntryForm)
        @include('livewire.ctms.patients.infos.patient-life-style')
    @endif
    
    @if($openNewClinicalInvestigationsEntryForm)
        @include('livewire.ctms.patients.infos.patient-clinical-investigations')
    @endif

    @if($openNewSensoryExaminationsEntryForm)
        @include('livewire.ctms.patients.infos.sensory-examination')
    @endif

    @if($openMDTREExaminationsEntryForm)
        @include('livewire.ctms.patients.infos.patient-mdtre')
    @endif

    @if($openRadiographsEntryForm)
        @include('livewire.ctms.patients.infos.patient-radiography')
    @endif

    @if($openModifiedPfirmannGradesEntryForm)
        @include('livewire.ctms.patients.infos.patient-modified-pfirmann-grades')
    @endif

    @if($openVisualAnalogScore)
        @include('livewire.ctms.patients.infos.patient-visual-analog-score')
    @endif

    @if($openMODIQScoreEntryForm) 
        @include('livewire.ctms.patients.infos.patient-modiq-score')
    @endif
    
    @if($openRMQScoreEntryForm)
        @include('livewire.ctms.patients.infos.patient-rmq-score')
    @endif








    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

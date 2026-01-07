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

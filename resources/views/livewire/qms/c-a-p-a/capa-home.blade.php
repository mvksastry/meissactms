<div>
    {{-- Be like water. --}}
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
            <h1 class="m-0">Home CA PA : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home CA PA</li>
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
          @include('livewire.qms.c-a-p-a.capa-flex-menu')
        </div>
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Home CA PA
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
                <button wire:click="fnNewCAPA()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp New CA-PA</button>
              </div>
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            
            <div class="row">
              <label class="form-class" for="sampdesc">List of Actionable CA & PA</label>
              </br>
              @if(count($actCapas) > 0)
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th>CAPA Type</th>
                    <th>Ref No</th>
                    <th>Description</th>
                    <th>Root Cause / Action Plan</th>
                    
                    <th>Target Date</br>Closure Date</th> 
                    <th>Reported By</th>
                    <th>CAPA Status</th> 
                    <th>Time Stamps</th> 
                    <th>Actions</th>                      
                  </tr>
                </thead>
                <tbody> 
                  @foreach($actCapas as $row)
                    <tr>
                      <td>{{ $row->capa_type }}</td>
                      <td>{{ $row->reference_no }}</td>
                      <td>{{ $row->issue_description }}</td>
                      <td>RC: {{ $row->root_cause }} </br>AP: {{ $row->action_plan }}</td>
                      <td>Target Dt: {{ $row->target_date }}</br> Closure Dt: {{ $row->closure_date }}</td>
                      <td>Rep By: {{ $row->reported_by }} </br> Resp: {{ $row->responsible_user_id }}</td>
                      <td>{{  $row->capa_status }}</td>
                      <td>Created At: {{ $row->created_at }}</br>Updated At: {{ $row->updated_at }}</td>  
                      <td>
                          <button wire:click="fnCAPADetails()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp CA PA Details</button>
                      </td>
                    </tr>    
                  @endforeach                          
                </tbody>
              </table>
              @else
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                    <tbody>
                    <tr>
                        <td>
                        <code>Corrective & Preventive Actions NOT Found</code>
                        </td>
                    </tr>
                    </tbody>
                </table>
              @endif
            </div>

            <div class="row">

            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    @if($p1)
      <livewire:qms.c-a-p-a.capa-incidences :entry="$entry" />
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

</div>

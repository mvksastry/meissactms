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
                      <th>Origin Nc</th>
                      <th>Division Reported</th>
                      <th>Raised By</th>
                      <th>Raised Role</th>
                      <th>Assigned Div</th>
                      <th>Description</th> 
                      <th>Current Status</th>     
                      <th>Action</th>                  
                  </tr>
                </thead>
                <tbody> 
                  @foreach($activeNcs as $row)
                    <tr>
                        <td>{{ ucfirst($row->origin_of_nc) }}</td>
                        <td>{{ ucfirst($row->division_reported) }}</td>
                        <td>{{ ucfirst($row->raised_by) }}</td>
                        <td>{{ ucfirst($row->raised_role) }}</td>
                        <td>{{ ucfirst($row->assigned_division) }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ ucfirst($row->current_status) }}</td>
                        <td>
                            <button wire:click="fnNCDetails('{{ $row->nc_id }}')" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp NC Details</button>
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
                      <code>Non Conformities NOT Found</code>
                    </td>
                  </tr>
                </tbody>
              </table>
          
              @endif
            </div>
            @if($allNcPanels)

              <livewire:qms.n-c.nc-acknowledges :nc_id="$nc_id" />
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->
              <livewire:qms.n-c.nc-communications :nc_id="$nc_id" />
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->
              <livewire:qms.n-c.nc-reviews :nc_id="$nc_id" />
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->
              <livewire:qms.n-c.nc-status-history-logs :nc_id="$nc_id" />
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->
              <livewire:qms.n-c.nc-audit-logs :nc_id="$nc_id" />
              <!--Divider-->
              <hr class="border-b-2 border-warning my-2 mx-2">
              <!--/ Divider-->
              <div class="row">
                <!-- /.col -->
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

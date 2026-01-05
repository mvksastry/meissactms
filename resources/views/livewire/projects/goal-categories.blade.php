<div>
    {{-- Be like water. --}}
    {{-- The whole world belongs to you. --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Divisions : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Divisions</li>
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
              Current - Divisions
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
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            
            <div class="row">
                @if(!(empty($divs)))
                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($divs as $row)
                                <tr>
                                    <td>
                                    {{ $row->name }}
                                    </td>
                                    <td>
                                    {{ $row->description }}
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                @else
                    <div class="col-sm-4 col-md-2">
                        No Information to display
                    </div>
                @endif
            </div>
            </br>
            
            <div class="row">
            <!-- /.col -->                
            <!-- /.col -->
            </div>
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--/ Divider-->
            <div class="row">
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <tbody> 
                  <tr>
                    <td>
                      <label>Name of Division</label>
                      <input wire:model="new_div_name" id="opd_id" type="text" class="form-control" placeholder="New Division">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label>Description</label>
                      <input wire:model.defer="new_div_desc" id="in_patient_id" type="text" class="form-control" placeholder="New Division Description">
                    </td>
                  </tr> 
                </tbody>
              </table>             
                <div class="col-sm-4 col-md-2">
                    <button wire:click="fnSaveNewDivision()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Save New Division</button>
                </div>
            </div>
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










    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

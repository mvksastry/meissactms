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
                    <h1 class="m-0">Home RCA : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Home RCA</li>
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
                    @include('livewire.qms.r-c-a.rca-flex-menu')
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
                                <button wire:click="fnNewRCA()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp New RCA</button>
                            </div>
                        </div>
                        <!-- /.row -->
                        <!--Divider-->
                        <hr class="border-b-2 border-warning my-2 mx-2">
                        <!--Divider-->
                        
                        <div class="row">
                            <label class="form-class" for="sampdesc">List of Actionable CA & PA</label>
                            </br>
                        
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
                                    <th>Actions</th>                      
                                </tr>
                                </thead>
                                <tbody> 
                                
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button wire:click="fnCAPADetails()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp RCA Details</button>
                                        </td>
                                    </tr>  
                                                                
                                </tbody>
                            </table>
                        
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>
                                    <code>Root Cause Analyses NOT Found</code>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                    
                        </div>
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


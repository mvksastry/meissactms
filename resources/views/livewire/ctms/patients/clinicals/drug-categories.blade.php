<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    {{-- In work, do what you enjoy. --}}
    {{-- The whole world belongs to you. --}}
    <!-- Content Wrapper. Contains page content -->
    <!-- COLOR PALETTE -->
    {{-- The Master doesn't talk, he acts. --}}
    {{-- In work, do what you enjoy. --}}
    {{-- The whole world belongs to you. --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home Drugs Categories : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Drug Categories</li>
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
                        Drug Categories
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
                            <label class="form-class" for="sampdesc">Add New Category</label>
                            </br>
                            
                            @if(!empty($drug_categories))
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                    Name
                                    </th>
                                    <th>
                                    Description
                                    </th>
                                    <th>
                                    Posted By
                                    </th>
                                    <th>
                                    Created At
                                    </th>
                                    <th>
                                    Updated At
                                    </th>
                                </tr>
                                </thead>
                                <tbody> 
                                @foreach($drug_categories as $row)
                                <tr>
                                    <td>
                                    {{ $row->category_name }}
                                    </td>
                                    <td>
                                    {{ $row->description }}
                                    </td>
                                    <td>
                                    {{  $row->posted_by }}
                                    </td>
                                    <td>
                                    {{ $row->created_at }}
                                    </td>
                                    <td>
                                    {{ $row->updated_at }}
                                    </td>
                                </tr>   
                                @endforeach                                                
                                </tbody>
                            </table>
                            @endif

                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                            <thead>
                            </thead>
                            <tbody> 
                                <tr>
                                <td colspan="4">
                                    <label>Name*</label>
                                    <input wire:model="ncDCat.name" type="text" class="form-control" placeholder="Category Name">
                                </td>
                                </tr>
                                <tr>
                                <td colspan="4">
                                    <label>Description*</label>
                                    <input wire:model="ncDCat.desc" type="text" class="form-control" placeholder="Description">
                                </td>
                                </tr>                                                    
                            </tbody>
                            </table>
                            <div class="col-sm-6 col-md-4">
                                <button wire:click="fnCreateNewCategory()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Create Category</button>
                            </div>
                        </div>
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
    <!-- /.content -->
    </div>
</div>


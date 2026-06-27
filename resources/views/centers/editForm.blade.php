@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard : {{ ucfirst(Auth::user()->roles->pluck('name')[0] ?? '' ) }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Centers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Edit Center
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <!--
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                      </li>
                    -->
                  </ul>
                </div>
              </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-4">
                    <!-- Morris chart - Sales -->
                    <div class="table-responsive" id="revenue-chart2" style="position: relative;"> 
                      <form action="{{ route('centers.update', $center->uuid) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="">Center Name</label>
                            <input type="text" name="name" value="{{ $center->name }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Category</label>
                            <input type="text" name="category" value="{{ $center->category }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{ $center->description }}" class="form-control" />
                        </div>                                    
                        <div class="mb-3">
                            <label for="">Location</label>
                            <input type="text" name="location" value="{{ $center->location }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Total Capacity</label>
                            <input type="text" name="total_size" value="{{ $center->total_size }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Current Occupied</label>
                            <input type="text" name="total_count" value="{{ $center->total_count }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">In-Charge</label>
                            <input type="text" name="incharge_name" value="{{ $center->incharge_name }}" value="null" class="form-control" />
                        </div>
                      
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" value="{{ $center->notes }}" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>




              <div class="card-body">

              </div><!-- /.card-body -->
            </div>

          </section>

        </div> 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
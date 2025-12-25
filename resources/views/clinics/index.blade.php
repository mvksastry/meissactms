@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
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
          @include('clinics.flexWrap')
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
                  Active Clinics
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
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  @if(count($active_clinics) > 0)
                    <table id="example2" class="table table-sm table-bordered table-hover">
                      <thead>
                        <tr>
                          <th> Name </th>
                          <th> Category </th>
                          <th> Description </th>
                          <th> Location </th>
                          <th> In-Charge </th>
                          <th> Status</th>
                          <th> Created</th>
                          <th> Updated</th>
                          <th> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($active_clinics as $row)
                          <tr>
                            <td> {{ $row->clinic_name }} </td>
                            <td> {{ $row->category }} </td>
                            <td> {{ $row->description }} </td>
                            <td> {{ $row->address }} </td>
                            <td> {{ $row->incharge_name }} </td>
                            <td> {{ ucfirst($row->status) }} </td>
                            <td> {{ date('d-m-Y H:i:s', strtotime($row->created_at)) }} </td>
                            <td> {{ date('d-m-Y H:i:s', strtotime($row->updated_at)) }} </td>                          
                            <td>
                              <a href="{{ route('clinics.show',[$row->clinic_uuid]) }}"> 
                                <button class="btn btn-sm btn-info">Edit</button>
                              </a>
                              <a href="{{ route('clinics.edit',[$row->clinic_uuid]) }}"> 
                                <button class="btn btn-sm btn-danger">Inactivate</button>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    <table id="example2" class="table table-sm table-bordered table-hover">
                      <thead>
                        <tr>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td align="left">
                            None to diplay
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  @endif
                    <!--Divider-->
                    <hr class="border-b-2 border-warning my-2 mx-2">
                    <!--Divider-->

                </div>
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
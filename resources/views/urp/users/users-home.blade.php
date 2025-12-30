@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home: Users</a></li>
              <li class="breadcrumb-item active">Users</li>
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
          @include('urp.users.flex-wrap-users')
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          @if(session('success'))
              <div class="mx-2 alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          @if(session('error'))
              <div class="mx-2 alert alert-danger">
                  {{ session('error') }}
              </div>
          @endif
          @if(session('info'))
              <div class="mx-2 alert alert-info">
                  {{ session('info') }}
              </div>
          @endif
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Active Centers
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
                  @if(count($users) > 0)
                    <table id="example2" class="table table-sm table-bordered table-hover">
                      <thead>
                        <tr>
                          <th> Name </th>
                          <th> Email </th>
                          <th> Verified On </th>
                          
                          <th> Start Date </th>
                          <th> Expires On </th>
                          <th> First Log in </th>
                          <th> Status</th>
                          <th> Created</th>
                          <th> Updated</th>
                          <th> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $row)
                          <tr>
                            <td> {{ $row->name }} </td>
                            <td> {{ $row->email }} </td>
                            <td> {{ $row->email_verified_at }} </td>
                            
                            <td> {{ $row->start_date }} </td>
                            <td> {{ $row->expiry_date }} </td>
                            <td> {{ $row->first_login }} </td>
                            <td> </td>
                            <td> {{ date('d-m-Y H:i:s', strtotime($row->created_at)) }} </td>
                            <td> {{ date('d-m-Y H:i:s', strtotime($row->updated_at)) }} </td>                          
                            <td>
                              <a href="{{ route('ctms-users.show',[$row->uuid]) }}"> 
                                <button class="btn btn-sm btn-info">Edit</button>
                              </a>
                              <a href="{{ route('ctms-users.edit',[$row->uuid]) }}"> 
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
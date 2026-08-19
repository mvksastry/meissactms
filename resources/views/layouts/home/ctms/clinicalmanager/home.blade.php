@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">{{ Auth::user()->name }} </h3>
            <h4> Role: {{ ucfirst(Auth::user()->roles->pluck('name')[0] ?? '') }} </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Pending Tasks
            </h3>
          </div>
          <div class="card-body">
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">

              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 30%;">Task</th>
                    <th style="width: 30%;">For Attention</th>
                    <th style="width: 30%;">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @if (count($obPatients) > 0)
                    <tr>
                      <td>
                        <strong>O</strong>n <strong>B</strong>oarded Patients Waiting For Entry of Data
                      </td>
                      <td>
                        <label class="text-danger"><strong>{{ count($obPatients) }}</strong></label>
                      </td>
                      <td>
                        <a href="/edit-patients" button class="btn btn-block btn-warning rounded" type="button"><i
                            class="ion ion-person"></i>&nbsp
                          Go To Enter</button></a>
                      </td>
                    </tr>
                  @endif
                  @if (count($fuPatients) > 0)
                    <tr>
                      <td>
                        Follow-up Data Entry Patients Waiting
                      </td>
                      <td>
                        <label class="text-danger"><strong>{{ count($fuPatients) }}</strong></label>
                      </td>
                      <td>
                        <a href="/patient-followup" button class="btn btn-block btn-warning rounded" type="button"><i
                            class="ion ion-person"></i>&nbsp
                          Go To Enter</button></a>
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

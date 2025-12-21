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
              <li class="breadcrumb-item active">Documents</li>
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
          @include('docs.flexWrapDocs')
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
                  
                    <table id="example2" class="table table-sm table-bordered table-hover">
                      @if(count($activeDocs) > 0)
                        <thead>
                          <tr>
                            <th> Category </th>
                            <th style="width: 16.66%"> Title / </br> Description </th>
                            <th> Eff.Date </th>
                            <th> Created / Date</th>
                            <th> Approved </th>
                            <th> Sealed </th>
                            <th> Versions </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($activeDocs as $row)
                            <tr>
                              <td>
                                @foreach($row->category as $val)
                                {{ $val->name }} 
                                @endforeach
                              </td>

                              <td>
                                Title: {{ $row->title }} /</br> Desc: {{ $row->summary }}
                              </td>

                              <td>
                                {{ $row->effective_date }}
                              </td>    

                              <td>{{ $row->created_name }} / </br>Date: {{ $row->date_created }}</td>
                             
                              <td> {{ $row->approved_name }} / </br>Date: {{ $row->approved_date }} </td>

                              <td> {{ $row->sealed_name }} / </br>Date: {{ $row->sealed_date }} </td>

                              <td> 
                                <?php $versions = $row->doc_versions;?>
                                <table>
                                  <tr>
                                    <th>V.No</th>
                                    <th>Status</th>
                                    <th>Pre V.no/</br>Nxt.V.no</th>
                                    <th>Obs At/ </br>Obs By</th>
                                    <th>Actions</th>
                                  </tr>
                                  <tbody>
                                    @foreach($versions as $version)
                                      <tr>
                                        <td>
                                          v{{ $version->version_number }}
                                        </td>
                                        <td>
                                          <?php $sa = ["0"=>"Obsol","1"=>"Active"]; ?>
                                          {{ $sa[$version->is_active] }}
                                        </td>
                                        <td>
                                          {{ $version->supersedes_version_id }} /</br> {{ $version->superseded_by_version_id }}
                                        </td>
                                        <td>
                                          {{ $version->obsolete_at }} /</br> {{ $version->obsolete_by }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info">Edit</button>
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      @else
                        <thead>
                          <tr>
                            <th>None to Display</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      @endif
                    </table>
                  
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
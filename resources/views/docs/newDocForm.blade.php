@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Documents : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create</li>
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
          <div class="container-fluid px-4">
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
            @if (session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
            @endif
            @if (session('info'))
              <div class="alert alert-info">
                {{ session('error') }}
              </div>
            @endif
			
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Upload New Document
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item"></li>
                      <li class="nav-item"></li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->

                <div class="card-body">
                  <div class="tab-content p-4">
                    <!-- Morris chart - Sales -->
                    <div class="table-responsive" id="revenue-chart2" style="position: relative;"> 
                      <form action="{{ route('documents.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                          <div class="row">
                            <div class="col-sm-3">
                              <label for="">Category</label>
                              <select class="custom-select rounded-0" name="category" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                @foreach($categories as $row)
                                  <option value="{{ $row->category_id }}">{{ $row->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-sm-3">
                              <label for="">Confidentiality</label>
                              <select class="custom-select rounded-0" name="category" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                            <div class="col-sm-3">
                              <label for="">Open Status</label>
                              <select class="custom-select rounded-0" name="category" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                            <div class="col-sm-3">
                              <label for="">Department</label>
                              <select class="custom-select rounded-0" name="department" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                <option value="administration">Administration</option>
                                <option value="QA">Quality Assurance</option>
                                <option value="QC">Quality Control</option>
                                <option value="Laboratory">Laboratory</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" />
                        </div>                        
                        <div class="mb-3">
                            <label for="">Created By</label>
                            <input type="text" name="created_by" value="{{ Auth::user()->name }}" class="form-control" />
                        </div>
                                    
                      
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" value="null" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </section>
            <!-- /.Left col -->
            <!-- right col -->
            </div>
          <!-- /.row (main row) -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
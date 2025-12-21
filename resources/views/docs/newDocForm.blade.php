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
                      <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                              <div class="mb-3">
                                <div class="form-check">
                                  <input disabled checked type="checkbox" class="form-check-input" name="form" id="form">
                                  <label class="form-check-label" for="exampleCheck1">New Document</label>
                                </div>
                              </div>
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <label for="">Category</label>
                              <select class="custom-select rounded-0" name="category_id" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                @foreach($categories as $row)
                                  <option value="{{ $row->category_id }}">{{ $row->name }}</option>
                                @endforeach
                              </select>
                              @error('category')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <!--
                            <div class="col-sm-3">
                              <label for="">Confidentiality</label>
                              <select class="custom-select rounded-0" name="confidentiality" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                            -->
                            <div class="col-sm-4">
                              <label for="">Open Status</label>
                              <select class="custom-select rounded-0" name="open_status" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                              @error('open_status')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="col-sm-4">
                              <label for="">Department</label>
                              <select class="custom-select rounded-0" name="department" id="exampleSelectRounded0">
                                <option value="-1">Select</option>
                                <option value="admin">Administration</option>
                                <option value="qa">Quality Assurance</option>
                                <option value="qc">Quality Control</option>
                                <option value="lab">Laboratory</option>
                              </select>
                              @error('department')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>





                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                  <label for="">Title</label>
                                  <input type="text" name="title" class="form-control" id="title" placeholder="Title" />
                                    @error('title')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="card card-outline card-info">
                                <div class="card-header">
                                  <h3 class="card-title">Content</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <textarea name="content" id="summernote" rows="5">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                  </textarea>
                                  @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- ./row -->
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3">
                                  <label for="">Description</label>
                                  <input type="text" name="description" class="form-control" id="description" placeholder="Description"/>
                                  @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror                            
                              </div> 
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12"> 
                              <div class="mb-3">
                                <label class="form-label" for="inputFile">File:</label>
                                <input type="file" name="sop_file" id="sop_file" class="form-control">
                  
                                @error('sop_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-4">
                              <div class="mb-3">
                                <label for="">Version No.</label>
                                <input type="number" class="form-control" id="version_num" name="version_num" placeholder="Version Number">
                                @error('version_num')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="mb-3">
                                <label for="">Supersedes Version ID</label>
                                <input type="number" class="form-control" id="supersedes_version_id" name="supersedes_version_id" placeholder="Supersedes Version ID">
                                @error('supersedes_version_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="mb-3">
                                <label for="">Superseded By Version ID</label>
                                <input type="number" class="form-control" name="superseded_by_version_id" id="superseded_by_version_id" placeholder="Superseded By Version ID">
                                @error('superseded_by_version_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-sm-4">
                              <div class="mb-3">
                                <label for="">Obsoleted At</label>
                                <input type="Date" class="form-control" name="obsolete_at" id="Obsoleted At">
                                @error('obsolete_at')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="mb-3">
                                <label for="">Obsolete By</label>
                                <input type="text" class="form-control" name="obsolete_by" id="Obsoleted By">
                                @error('obsolete_by')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="mb-3">
                                <label for="">Created By</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="created_by" id="Superseded By Version ID" id="Obsoleted By">
                                @error('created_by')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                          </div>
                        

                          <div class="row">
                            <div class="col-6">
                              <div class="mb-3">
                                  <label for="">Tags (Separated by ';')</label>
                                  <input type="text" name="tags" value="" class="form-control" />
                                  @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>

                            <div class="col-6">
                              <div class="mb-3">
                                <label for="">Notes</label>
                                <input type="text" name="notes" value="null" class="form-control" />
                                  @error('notes')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>                              
                              </div>
                            </div>
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
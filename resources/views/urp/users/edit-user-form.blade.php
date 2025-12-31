@extends('layouts.app')
@section('content')


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: New User</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">New User</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				
				<!-- Main row -->
          @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
         @endif
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-12 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Project Data
							</h3>
							<div class="card-tools">
							  <ul class="nav nav-pills ml-auto">
                  <li class="nav-item"></li>
                  <li class="nav-item"></li>
							  </ul>
							</div>
						  </div><!-- /.card-header -->
						  <div class="card-body">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								
                  <form method="POST" action="{{ route('ctms-users.update', $edit_user->uuid) }}">
                    @csrf
                    @method('PUT')
                    

                    <!-- project data entry form -->
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="exampleInputBorderWidth2">Name*</label>
                        </br>
                        {{ $edit_user->name }}
                      </div>

                      <div class="col-md-6 form-group">
                        <label for="exampleInputBorderWidth2">Email*</label>
                        </br>
                        {{ $edit_user->email }}
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="exampleInputBorderWidth2">password*</label>
                        <input type="text" class="form-control form-control-border" 
                        name="password" id="password" placeholder="Password">
                        @if($errors->has('password'))
                          <p class="help-block text-danger">
                            {{ $errors->first('password') }}
                          </p>
                        @endif
                      </div>  

                      <div class="col-md-6 form-group">
                        <label for="exampleInputBorderWidth2">Role*</label>
                        </br>
                        Assign/Change Through Roles
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="exampleInputBorderWidth2">Start Date*</label>
                        </br>
                        {{ date('d-m-Y', strtotime($edit_user->start_date)) }}
                      </div>                     

                      <div class="col-md-6 form-group">
                        <label for="exampleInputBorderWidth2">End Date*</label>
                        <input type="date" class="form-control form-control-border" 
                        name="end_date" id="end_date" value="{{ $edit_user->end_date }}" placeholder="End Date">
                        @if($errors->has('end_date'))
                          <p class="help-block text-danger">
                            {{ $errors->first('end_date') }}
                          </p>
                        @endif
                      </div>   
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                         
                    <!-- end of project data entry form -->
                  </form>
								
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
					<!-- /.Left col -->
					<!-- right col -->
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>

		
	</div>	
@endsection('content')

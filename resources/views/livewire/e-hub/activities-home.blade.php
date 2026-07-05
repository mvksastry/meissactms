<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <main>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper px-2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 mb-3">Home: Activities</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home: Activites</a></li>
                  <li class="breadcrumb-item active">Home</li>
                </ol>
              </div><!-- /.col -->
                @include('livewire.e-hub.flex-menu-activities')            
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        

        <!-- Main content -->
        <section id="top1" class="content">
          <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section id="top2" class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      ACTIVITIES Home
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
                      <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                        <div class="p-1">
                          <div class="table-responsive" id="revenue-chart2" style="position: relative;">
                                @if($activities != null)
                                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Name </th>
                                                <th> Description </th>
                                                <th> Created On </th>
                                                <th> Updated On </th>
                                            </tr>
                                        </thead>
                                        <tbody> 		
                                            @foreach($activities as $row)
                                            <tr>
                                                <td> {{  $row->category_id }} </td>
                                                <td> {{  $row->name }} </td>
                                                <td> {{  $row->description }}</td>
                                                <td> {{  date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                <td> {{  date('d-m-Y', strtotime($row->updated_at)) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            No Information to Display
                                        </thead>
                                    </table>
                                @endif
                            </br>
                            @include('livewire.e-hub.new-activity-form')  
                            
                          </div>
                        </div>
                        <!--Divider-->
                        <hr class="border-b-2 my-1 mx-1">
                        <!--Divider-->
                        <div class="p-1">      
                                    
                        </div>
                      </div>
                    </div>
                  </div> <!-- /. card body end -->
                </div>
              </section>
            </div><!-- /.row (main row) -->
            <!-- Main row -->
            <div class="row">
              <!-- All Bottoms for show/hide based on status -->

              <!-- /All Bottoms for show/hide based on status -->
            </div><!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
      </div>
    </main>
  </div>
  




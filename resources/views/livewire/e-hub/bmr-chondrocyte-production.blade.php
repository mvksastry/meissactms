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
                <h1 class="m-0 mb-3">Production - Chondrocyte: Home</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home: ChondCyte</a></li>
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
                      Action Batches
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

                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th> ID </th>
                                    <th> Assigned </br> By / Date </th>
                                    <th> Description </th>
                                    <th> Status </th>
                                    <th> Start Date / </br> End Date </th>
                                    <th> Created On / </br> Updated On </th>
                                    <th> MBR Id </th>
                                    <th> AuPL Media Id</th>
                                    <th> Chond Cyte </br> Prod ID </th>
                                    <th> Actions </th>
                                  </tr>
                                </thead>
                                <tbody> 		

                                </tbody>
                              </table>
                    
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  Either No Enrollment or No Information to Display
                                </thead>
                              </table>
                        
                            </br>
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
  





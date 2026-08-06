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
                <h1 class="m-0 mb-3">Home: End Activity</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home: End Activity</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->

                @include('livewire.egov.flex-menu-ctms-activities')            

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
                      End Activity
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
                            @if(count($activities) > 0)
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                      <th>InCharge</th>
                                      <th>Leader</th>
                                      <th>Code</th>
                                      <th>Description</th>
                                      <th>Status /</br> Date</th>
                                      <th>Start Date / </br> End Date</th>
                                      <th>Budget</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                  @foreach($activities as $row)
                                    <tr>
                                      <td>
                                          {{ $row->incharge->name }}
                                      </td>
                                      <td>
                                          {{ $row->leader->name }}
                                      </td>
                                      <td>
                                          {{ $row->code }}
                                      </td>
                                      <td>
                                          {{ $row->description }}
                                      </td>
                                      <td>
                                          {{ ucfirst($row->status) }} </br> {{ date('d-m-Y', strtotime($row->status_date)) }}
                                      </td>
                                      <td>
                                          {{ date('d-m-Y', strtotime($row->start_date)) }} </br> {{ date('d-m-Y', strtotime($row->end_date)) }}
                                      </td>
                                      <td>
                                          {{ number_format($row->budget, 2) }}
                                      </td>
                                      <td>
                                          <button wire:click="fnEditCtmsActivityById('{{ $row->ctms_activity_id}}')" class="btn btn-block btn-warning rounded" type="button" ><i class="ion ion-person"></i>&nbsp Edit</button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            @else 
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th>No Information to display</th>
                                    </tr>
                                </thead>
                              </table>
                            @endif
                          </div>
                        </div>
                        <!--Divider-->
                        <hr class="border-b-2 my-1 mx-1">
                        <!--Divider-->
                        <div class="p-1"> 
                          @if($p1)    
                            @include('livewire.egov.activity-details-end-form')
                          @endif
                        </div>
                        <hr class="border-b-2 my-1 mx-1">
                        <div class="p-1"> 
                          @if($p2)   

                          @endif
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





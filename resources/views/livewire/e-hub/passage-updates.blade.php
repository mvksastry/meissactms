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
                <h1 class="m-0 mb-3">Passages: Home</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home: Passages</a></li>
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
                            @if(count($ccps) > 0  )
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th> ID </th>
                                    <th> Date Assigned </th>
                                    <th> Description </th>
                                    <th> Status </th>
                                    <th> Start Date / </br> End Date </th>
                                    <th> Created On / </br> Updated On </th>
                                    <th> MBR Id </th>
                                    <th> Actions </th>
                                  </tr>
                                </thead>
                                <tbody> 		
                                  @foreach($ccps as $ccp)
                                    <tr>
                                      <td>{{ $ccp->auplmed_production_id }}</td>
                                      <td>{{ $ccp->assigned_date }}</td>
                                      <td>{{ $ccp->ctmsinfo->description ?? 'N/A' }}</td>
                                      <td>{{ $ccp->status }}</td>
                                      <td>{{ $ccp->ctmsinfo->start_date }} </br> {{ $ccp->ctmsinfo->end_date }}</td>
                                      <td>{{ date('d-m-Y', strtotime($ccp->created_at)) }} </br> {{ date('d-m-Y', strtotime($ccp->updated_at))   }}</td>
                                      <td>{{ $ccp->ctmsinfo->mbr_id ?? 'N/A' }}</td>
                                      <td>
                                        <button wire:click="fnOpenProductionForm('{{ $ccp->chondcyte_production_id }}')" class="btn btn-info text-white font-normal mt-3 rounded">ENTER</button>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            @else
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  Either No Enrollment or No Information to Display
                                </thead>
                              </table>
                            @endif
                            </br>
                          </div>
                        </div>
                        <!--Divider-->
                        <hr class="border-b-2 my-1 mx-1">
                        <!--Divider-->
                        <div class="p-1">      
                          @if($passagesForm)
                            @php
                              $res = json_decode($this->selectedCcps->completed_stages, true);
                              //dd($res);
                            @endphp
                            @include('livewire.e-hub.passages-completed')
                            @include('livewire.e-hub.cell-passages')
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
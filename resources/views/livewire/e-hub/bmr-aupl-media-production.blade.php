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
                <h1 class="m-0 mb-3">Production-AuPL Media : Home</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home: AuPL Media</a></li>
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
                      Pending Initiation of Production
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
                            @if(count($amps) > 0  )
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
                                  @foreach($amps as $amp)
                                    <tr>
                                      <td>{{ $amp->auplmed_production_id }}</td>
                                      <td>{{ $amp->assigned_date }}</td>
                                      <td>{{ $amp->ctmsinfo->description ?? 'N/A' }}</td>
                                      <td>{{ $amp->status }}</td>
                                      <td>{{ $amp->ctmsinfo->start_date }} </br> {{ $amp->ctmsinfo->end_date }}</td>
                                      <td>{{ date('d-m-Y', strtotime($amp->created_at)) }} </br> {{ date('d-m-Y', strtotime($amp->updated_at))   }}</td>
                                      <td>{{ $amp->ctmsinfo->mbr_id ?? 'N/A' }}</td>
                                      <td>
                                        <button wire:click="fnOpenProductionForm('{{ $amp->auplmed_production_id }}')" class="btn btn-info text-white font-normal mt-3 rounded">ENTER</button>
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
                          @if($productionForm)
                            @php
                              $res = json_decode($this->selectedAmps->completed_stages, true);
                              //dd($res);
                            @endphp
                              

                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th> Step No </th>
                                  <th> Date Time </th>
                                  <th> Description </th>
                                  <th> Completed </th>
                                  <th> Done By </th>
                                  <th> Checked By </th>
                                  <th> Observations </th>
                                  <th> Deviations </th>
                                </tr>
                              </thead>
                              <tbody> 
                                @foreach($res as $x)
                                 
                                    
                                    <tr>
                                      <td>
                                      {{ $x['step_no'] }}
                                      </td>
                                      <td>
                                      {{ $x['date_time'] }}
                                      </td>
                                      <td>
                                      {{ $x['description'] }}
                                      </td>
                                      <td>
                                      {{ $x['step_completed'] }}
                                      </td>
                                      <td>
                                      {{ $x['done_executed_by'] }}
                                      </td>
                                      <td>
                                      {{ $x['checked_by'] }}
                                      </td>
                                      <td>
                                      {{ $x['observations'] }}
                                      </td>
                                      <td>
                                      {{ $x['deviations'] }}
                                      </td>
                                    </tr>
                                    
                                  
                                @endforeach

                                
                              </tbody>
                            </table>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th colspan="4"> Progress </th>
                                </tr>
                              </thead>
                              <tbody> 
                                
                              </tbody>
                            </table>


                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th colspan="4"> BATCH PROCESSING RECORD FOR PREPARING AUTOLOGOUS PLATELET LYSATE (AuPL) AND COMPLETE MEDIUM </th>
                                </tr>
                              </thead>
                              <tbody> 		
                                <tr>
                                  <td> Issue Date: {{ $this->amps_steps->issue_date ?? 'N/A' }}</td>
                                
                                  <td> Prepared By: {{ $this->amps_steps->prepared_by ?? 'N/A' }}</td>
                                
                                  <td> Reviewed By: {{ $this->amps_steps->reviewed_by ?? 'N/A' }}</td>
                                
                                  <td> Version No: {{ $this->amps_steps->version_no ?? 'N/A' }}</td> 
                                </tr>
                                <tr>
                                  <td> Amendment No: {{ $this->amps_steps->amendment_no ?? 'N/A' }}</td>
                                
                                  <td> Amendment Date: {{ $this->amps_steps->amendement_date ?? 'N/A' }}</td>
                                
                                  <td> Created At: {{ $this->amps_steps->created_at ?? 'N/A' }}</td>
                                
                                  <td> Updated At: {{ $this->amps_steps->updated_at ?? 'N/A' }}</td> 
                                </tr>

                                <tr>
                                  <td class="bg-warning" colspan="4"> Step {{ $this->amps_steps->aupl_medium_step_id ?? 'N/A' }}: {{ $this->amps_steps->description ?? 'N/A' }}</td>
                                </tr>

                                <tr>
                                  <td colspan="4"> Step Expectations: </td>
                                </tr>

                                <tr>  
                                  <td> 
                                    <label>Step Completed</label>
                                    <input type="text" wire:model="step_completed" class="form-control" placeholder="Enter ...">
                                    @error('step_completed') <span class="error text-danger">{{ $message }}</span> @enderror
                                  </td>
                                
                                  <td> 
                                    <div class="form-group">
                                      <div class="form-check">
                                        <input wire:model="date_time" class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Date & Time (Auto Enter)</label>
                                      </div>
                                    </div>
                                    @error('date_time') <span class="error text-danger">{{ $message }}</span> @enderror
                                    
                                  </td>
                                
                                  <td> 
                                    <label>Done/Executed By </label> 
                                    <input type="text" wire:model="done_executed_by" class="form-control" placeholder="Enter ...">
                                    @error('done_executed_by') <span class="error text-danger">{{ $message }}</span> @enderror
                                  </td>

                                  <td> 
                                    <label>Checked By </label>
                                    <input type="text" wire:model="checked_by" class="form-control" placeholder="Enter ...">
                                    @error('checked_by') <span class="error text-danger">{{ $message }}</span> @enderror
                                  </td> 
                                </tr>
                                <tr>
                                  <td colspan="4"> 
                                    <label>Observations </label>
                                    <input type="text" wire:model="observations" class="form-control" placeholder="Enter ...">
                                    @error('observations') <span class="error text-danger">{{ $message }}</span> @enderror
                                  </td> 
                                </tr>
                                <tr>
                                  <td colspan="4"> 
                                    <label>Deviations, If any,  </label>
                                    <input type="text" wire:model="deviations" class="form-control" placeholder="Enter ...">
                                    @error('deviations') <span class="error text-danger">{{ $message }}</span> @enderror
                                  </td> 
                                </tr>

                              </tbody>
                            </table>

                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                              <thead>
                                  <tr>
                                    <th> Enter Data </th>
                                  </tr>
                              </thead>
                              <tbody> 		
                                <tr>
                                  <td>                         
                                    <div class="form-check">
                                      <input wire:model="all_verified" class="form-check-input" type="checkbox">
                                      <label class="form-check-label">All Verified</label>
                                      @error('all_verified') <span class="error text-danger">{{ $message }}</span> @enderror  
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>                         
                                    <div class="form-check">
                                      <input wire:model="post_data" class="form-check-input" type="checkbox">
                                      <label class="form-check-label">Completed the step</label>
                                       @error('post_data') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                  </td>
                                </tr>           
                                <tr>
                                  <td>
                                    <button wire:click="fnCreateAuplMediaProductionStepRecord()" class="btn btn-success text-white font-normal mt-3 rounded">ENTER STEP DATA</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
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
  





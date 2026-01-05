<div>
    {{-- Be like water. --}}
    {{-- The whole world belongs to you. --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Annual Goals : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Annual Goals</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

     <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Annual Goals
            </h3>
          </div>
          <div class="card-body">
            @if($sys_panel)
              @include('livewire.eac_sys_panel')
            @endif
            @if($msg_panel)
              @include('livewire.eac_msg_panel')
            @endif
            <!-- /.col-12 -->
            <!-- /.col-12 -->
            <div class="row">
            </div>
            <!-- /.row -->
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--Divider-->
            
            <div class="row">
                @if(!(empty($employees)))
                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($employees as $row)
                                <tr>
                                    <td>
                                    {{ $row->name }}
                                    </td>
                                    <td>
                                        <div class="col-6 col-md-4">
                                        <button wire:click="fnShowEmployeeGoals('{{ $row->id }}')" type="button" class="btn btn-block btn-primary">
                                            <i class="ion ion-person"></i>
                                            &nbsp Annual Goals
                                        </button>
                                        </div>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                @else
                    <div class="col-sm-4 col-md-2">
                        No Information to display
                    </div>
                @endif
            </div>
            </br>
            
            <div class="row">
            <!-- /.col -->                
            <!-- /.col -->
            </div>
            <!--Divider-->
            <hr class="border-b-2 border-warning my-2 mx-2">
            <!--/ Divider-->
            <?php $count = 1; ?>
            <div class="row">
              @if(!empty($empGoals))
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th colspan="3">
                        <code>Goals: </code>{{ ucfirst($empSelected->name) }}
                      </th>
                    </tr>
                  </thead>
                  <tbody> 
                    
                      @foreach($empGoals as $row)
            
                      <tr>
                        <td width="10%" rowspan="8">    
                          <div class="form-group">
                            <label for="exampleSelectRounded0">Goal <code></code></label>
                          </br>
                          {{ $count }}
                          </div>   
                          <hr class="border-b-2 border-warning my-2 mx-2">
                          <div class="form-group">
                            <label for="exampleSelectRounded0">Goal <code>Priority</code></label>
                          </br>
                          {{ ucfirst($row->priority) }}
                          </div>                   
                          <hr class="border-b-2 border-warning my-2 mx-2">   
                          <div class="form-group">
                            <label for="exampleSelectRounded0">Weightage (<code>%</code>)</label>
                          </br>
                          {{ $row->weightage }} 
                          </div>
                          <hr class="border-b-2 border-warning my-2 mx-2">
                          <div class="form-group">
                            <label for="exampleSelectRounded0">Status <code>Active</code></label>
                          </br>
                          {{ ucfirst($row->status) }}
                          </div>
                        </td>
                      
                        <td rowspan="8">
                          <label>Goal/Title</label>
                          </br>
                          {{ $row->title }}
                          </br>
                          <hr class="border-b-2 border-warning my-2 mx-2">
                          <label>Description</label>
                          </br> 
                          {{ $row->description }}
                          <hr class="border-b-2 border-warning my-2 mx-2">
                            <label><code>Progress</code> Updates</label>
                            </br>
                            @foreach($row->goalProgress as $val)
                              {{ date('d-m-Y', strtotime($val->logged_at)) }}: {{ $val->note }};
                                </br>
                            @endforeach
                              </br>
                            <div class="progress mb-1">
                                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                      aria-valuemax="100" style="width: {{ $val->progress }}%">
                                    <span class="sr-only">{{ $val->progress }}% Complete (success)</span>
                                  </div>
                            </div>
                            Progress: {{ $row->progress }} %
                        </td>
                        

                        
                        <tr>
                            <td>
                            <label><u class="text-danger"><strong>S</strong></u>pecific</label>
                            </br>
                            {{ $row->specific }}
                            
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <label><u class="text-danger"><strong>M</strong></u>easurable</label>
                            </br>
                            {{ $row->measurability }}                           
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <label><u class="text-danger"><strong>A</strong></u>chievable</label>
                            </br>
                            {{ $row->measurability }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <label><u class="text-danger"><strong>R</strong></u>elevant</label>
                            </br>
                            {{ $row->relevancy }}
                        </tr>
                        
                        <tr>
                            <td>
                            <label><u class="text-danger"><strong>T</strong></u>ime Bound</label>                
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <label>Start Date</label>
                            </br>
                            {{ date('d-m-Y', strtotime($row->start_date)) }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <label>End Date</label>
                            </br>
                            {{ date('d-m-Y', strtotime($row->end_date)) }}
                            </td>
                        </tr>
                      </tr>

                      <?php $count = $count + 1; ?>
                    @endforeach
                  
                  </tbody>
                </table> 
              @endif
            </div>
            <!--/ Divider-->
            </br>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- START ALERTS AND CALLOUTS -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content --> 










    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>


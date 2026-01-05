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
                <h1 class="m-0">Employee Goals : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Employee Goals</li>
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
              Employee Goals
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
                @if(!(empty($empGoals)))
                    <table id="userIndex2" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Priority</th>
                                <th>Goal</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($empGoals as $row)
                                <tr>
                                    <td>
                                    <strong>{{ ucfirst($row->priority) }}</strong>
                                    </td>
                                    <td>
                                    <strong>{{ $row->title }}</strong>
                                    </br>
                                    <strong class="text-danger">Weightage: </strong>{{ $row->weightage }} %
                                    </td>
                                    <td>
                                    <strong class="text-danger">Description:</strong> {{ $row->description }}
                                    </br>
                                    <strong class="text-danger">Specificity:</strong> {{ $row->specific }}
                                    </br>
                                    <strong class="text-danger">Measurables:</strong> {{ $row->measurability }}
                                    </br>
                                    <strong class="text-danger">Achievables:</strong> {{ $row->achievability }}
                                    </br>
                                    <strong class="text-danger">Relevancy:</strong> {{ $row->relevancy }}
                                    </br>
                                    <strong class="text-danger">Time Bound:</strong>
                                    </br>
                                    Starts: {{ $row->start_date }}
                                    </br>
                                    Ends: {{ $row->end_date }}
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
            <div class="row">
              @if($closeGoalPanel)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tbody> 
                    <tr>
                      <td>
                          <div class="form-group">
                            <label for="exampleSelectRounded0">Goal <code>Division</code></label>
                            <select wire:model="goal.div_id" class="custom-select rounded-0">
                              <option value="-1">Select</option>
                              @foreach($divs as $row)
                              <option value="{{ $row->division_id }}">{{ $row->name }}</option>
                              @endforeach
                            </select>
                          </div>
                      </td>
                      <td>
                          
                        <label>Employee</label>
                        <input wire:model="goal.employee_name" type="text" class="form-control" placeholder="New Division Description">
                          
                      </td>
                    </tr>
                  </tbody>
                </table>


                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tbody> 
                    <tr>

                      <td width="10%" rowspan="8">                            
                        <div class="form-group">
                          <label for="exampleSelectRounded0">Goal <code>Priority</code></label>
                          <select wire:model="goal.priority" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option value="-1">Select</option>
                            <option value="low">Low</option>
                            <option value="medium">Meidum</option>
                            <option value="high">High</option>
                          </select>
                        </div>                      
                        <div class="form-group">
                          <label for="exampleSelectRounded0">Weightage <code>%</code></label>
                          <input wire:model="goal.weightage" type="number" class="custom-select rounded-0" id="exampleSelectRounded0">
                        </div>
                      </td>
                    
                      <td rowspan="8">
                        <label>Goal/Title</label>
                        <textarea wire:model="goal.title" class="form-control" rows="5" ></textarea>
                        <label>Description</label>
                        <textarea wire:model="goal.desc" class="form-control" rows="5"></textarea> 
                      </td>
                      

                      
                      <tr>
                          <td>
                          <label>Goal-<u class="text-danger"><strong>S</strong></u>pecific</label>
                          <textarea wire:model="goal.specificity" class="form-control" rows="2" placeholder="Specificity"></textarea> 
                          </td>
                      </tr>

                      <tr>
                          <td>
                          <label>Goal-<u class="text-danger"><strong>M</strong></u>easurable</label>
                          <textarea wire:model="goal.measurability" class="form-control" rows="2" placeholder="Measurability"></textarea>   
                          </td>
                      </tr>

                      <tr>
                          <td>
                          <label>Goal-<u class="text-danger"><strong>A</strong></u>chievable</label>
                          <textarea wire:model="goal.achievability" class="form-control" rows="2" placeholder="Achievablity"></textarea>   
                          </td>
                      </tr>

                      <tr>
                          <td>
                          <label>Goal-<u class="text-danger"><strong>R</strong></u>elevant</label>
                          <textarea wire:model="goal.relevancy" class="form-control" rows="2" placeholder="Relevancy"></textarea>   
                      </tr>
                      
                      <tr>
                          <td>
                          <label>Goal-<u class="text-danger"><strong>T</strong></u>ime Bound</label>                
                          </td>
                      </tr>

                      <tr>
                          <td>
                          <label>Goal-Start Date</label>
                          <input wire:model="goal.start_date" type="date" class="form-control" placeholder="Start Date">
                          </td>
                      </tr>

                      <tr>
                          <td>
                          <label>Goal-End Date</label>
                          <input wire:model="goal.end_date" type="date" class="form-control" placeholder="New Division">
                          </td>
                      </tr>
                    </tr>

                  </tbody>
                </table>             
                <div class="col-sm-4 col-md-2">
                    <button wire:click="fnSaveAnnualGoal()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Save Goal</button>
                </div>
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


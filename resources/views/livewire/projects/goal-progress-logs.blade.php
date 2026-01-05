<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
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
                                    <?php 
                                        $words = explode(' ', $row->title);
                                        $truncated = implode(' ', array_slice($words, 0, 3));
                                        ?>
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
                                    <div class="col-6">
                                        <button wire:click="fnUpdateProgress('{{ $row->goal_id }}')" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Update "{{ $truncated }} ..."</button>
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
            <div class="row">
              @if($goalProgressUpdatePanel)
                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                  <tbody> 
                    <tr>
                      <td>
                        <label>Goal/Title: &nbsp;&nbsp;</label>"{{ $goal_title }}"
                        </br>
                        <label>Progress Update</label>
                        <textarea wire:model="goal.notes" class="form-control" rows="4"></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Progress: &nbsp;&nbsp;</label>(<code>%</code>)
                        </br>
                        <input wire:model="goal.progress_percent" class="form-control" type="number">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Status: &nbsp;&nbsp;</label>(<code>Check One</code>)
                        </br>
                        <div class="form-group">
                            <div class="form-check">
                              <input wire:model="goal.goal_status" class="form-check-input" value="not_started" type="radio" name="radio1">
                              <label class="form-check-label">Not Started</label>
                            </div>
                          <div class="form-check">
                            <input wire:model="goal.goal_status" class="form-check-input" value="in_progress" type="radio" name="radio1">
                            <label class="form-check-label">In Progress</label>
                          </div>
                          <div class="form-check">
                            <input wire:model="goal.goal_status" class="form-check-input" value="completed" type="radio" name="radio1">
                            <label class="form-check-label">Completed</label>
                          </div>
                          <div class="form-check">
                            <input wire:model="goal.goal_status" class="form-check-input" value="on_hold" type="radio" name="radio1">
                            <label class="form-check-label">On Hold</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>             
                <div class="col-sm-4 col-md-2">
                    <button wire:click="fnSaveGoalProgress()" type="button" class="btn btn-block btn-primary"><i class="ion ion-person"></i>&nbsp Update Progess</button>
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

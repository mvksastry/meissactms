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
              <h1 class="m-0 mb-3">Production : Home</h1>
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
                          @if (count($productionActivities) > 0)
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
                                @foreach ($productionActivities as $row)
                                  <tr>
                                    <td> {{ $row->ctms_activity_id }} </td>
                                    <td> {{ $row->assigned_by }} / {{ $row->assigned_date }}</td>
                                    <td style="width: 250px;"> {{ $row->description }}</td>
                                    <td> {{ ucfirst($row->status) }}</td>
                                    <td> {{ date('d-m-Y', strtotime($row->start_date)) }} </br>
                                      {{ date('d-m-Y', strtotime($row->end_date)) }}</td>
                                    <td> {{ date('d-m-Y', strtotime($row->created_at)) }} / </br>
                                      {{ date('d-m-Y', strtotime($row->updated_at)) }}</td>
                                    <td> {{ $row->mbr_id }}</td>
                                    <td> {{ $row->chondcyte_production_id }}</td>
                                    <td> {{ $row->auplmed_production_id }}</td>
                                    <td>
                                      <button wire:click="fnCreateAssociatedBMR('{{ $row->ctms_activity_id }}')"
                                        class="btn btn-success text-white font-normal mt-3 rounded">CREATE BMR</button>
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
                        @if ($showFormsForEntry)
                          <div class="container">
                            <div class="row">
                              <div class="col-sm-6">

                                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th> BATCH PROCESSING RECORD </br> AUTOLOGOUS PLATELET LYSATE (AuPL) AND
                                        COMPLETE MEDIUM </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td> CTMS Activity ID:{{ $ctms_activity_id }} </td>
                                    </tr>
                                    <tr>
                                      <td> Assigned By: </td>
                                    </tr>
                                    <tr>
                                      <td> MBR Id: In live will be shown</td>
                                    </tr>
                                    <tr>
                                      <td> Sample ID: In live will be shown </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label> Team Members (Can Select Multiple)</label>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <!-- Select multiple-->
                                            <div class="form-group">
                                              <select wire:model="team1_id" multiple class="form-control">
                                                @foreach ($users as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label> In-Charge</label>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <!-- Select multiple-->
                                            <div class="form-group">
                                              <select wire:model="incharge1_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($users as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <div class="form-check">
                                          <input wire:model="table1" class="form-check-input" type="checkbox">
                                          <label class="form-check-label">Create AuPL Media Production</label>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-group">
                                          <div class="form-check">
                                            <input class="form-check-input" wire:model.live="erecord_aupl"
                                              vlaue="yes" type="radio" name="radio1">
                                            <label class="form-check-label">Electronic</label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" wire:model.live="erecord_aupl"
                                              value="no" type="radio" name="radio1">
                                            <label class="form-check-label">Physical Record</label>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>

                              <div class="col-sm-6">

                                <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th> BATCH PROCESSING RECORD </br> EXPANSION OF CHONDROCYTES </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td> CTMS Activity ID:{{ $ctms_activity_id }} </td>
                                    </tr>
                                    <tr>
                                      <td> Assigned By: </td>
                                    </tr>
                                    <tr>
                                      <td> MBR Id: </td>
                                    </tr>
                                    <tr>
                                      <td> Sample ID: </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label> Team Members (Can Select Multiple)</label>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <!-- Select multiple-->
                                            <div class="form-group">
                                              <select wire:model="team2_id" multiple class="form-control">
                                                @foreach ($users as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label> In-Charge</label>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <!-- Select multiple-->
                                            <div class="form-group">
                                              <select wire:model="incharge2_id" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($users as $row)
                                                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check">
                                          <input wire:model="table2" class="form-check-input" type="checkbox">
                                          <label class="form-check-label">Create Chondrocyte Production</label>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-group">
                                          <div class="form-check">
                                            <input class="form-check-input" wire:model.live="erecord_ccyte"
                                              vlaue="yes" type="radio" name="radio1">
                                            <label class="form-check-label">Electronic</label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" wire:model.live="erecord_ccyte"
                                              value="no" type="radio" name="radio1">
                                            <label class="form-check-label">Physical Record</label>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                          <table id="userIndex2" class="table table-sm table-bordered table-hover">
                            <thead>
                              <tr>
                                <th> Process the Request </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <label>Posting Comment</label>
                                  <input wire:model="entry_comment" type="text" class="form-control"
                                    id="inputSuccess" placeholder="Enter ...">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <button wire:click="fnCreateBMRecords()"
                                    class="btn btn-success text-white font-normal mt-3 rounded">CREATE BMR</button>
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

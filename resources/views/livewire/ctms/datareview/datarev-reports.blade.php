    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Data Review: Patient Reports
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <!--
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                      </li>
                    -->
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="row">
                    <div class="col-12">
                      <!-- Custom Tabs -->
                        {{-- Success message --}}
                        @php
                            $i = 1;
                            $j =  1
                            //dd($Objs);
                        @endphp
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Information <label class="text-danger"></label></h3>
                        </div>
                        <div class="card-header d-flex p-0">
                          <ul class="nav nav-pills ml-auto p-2">
                            @foreach($Objs as $Obj)
                                <li class="nav-item"><a class="nav-link" href="#tab_{{ $i }}" data-toggle="tab">{{ ucfirst($Obj->data_type) }}</a></li>
                                @php
                                    $i = $i + 1
                                @endphp
                            @endforeach
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <!-- /.tab-pane -->
                            @foreach($Objs as $Obj)
                            <div class="tab-pane" id="tab_{{ $j }}">
                              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>{{ ucfirst($Obj->data_type) }}</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                
                                  <tr>
                                    <td>
                                      <label>Opd ID*</label>
                                    </br>
                                      {{ $Obj->opd_id }}
                                    </td>
                                    <td>
                                      <label>In Patient ID*</label>
                                      </br>
                                      {{ $Obj->ipd_id }}
                                    </td>
                                    <td>
                                      <label>Admission Date*</label>
                                      </br>
                                      {{ $Obj->admission_date }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>Cross Leg Sitting</label>
                                      </br>
                                      {{ $Obj->cross_leg_sitting }}
                                    </td>
                                    <td>
                                      <label>Standing</label>
                                      </br>
                                      {{ $Obj->standing }}
                                    </td>
                                    <td>
                                      <label>Sitting</label>
                                      </br>
                                      {{ $Obj->sitting }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">
                                      <div class="form-group">
                                        <label>Life Style Description</label>
                                        </br>
                                        {{ $Obj->life_style_description }}
                                      </div>
                                    </td>
                                  </tr>   
                                    <tr>
                                        <td colspan="2">
                                        <label>Comment</label>
                                        </br>
                                            {{ $Obj->comment_entered_by }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">
                                        <label>Entered By</label>
                                        </br>
                                        {{ $Obj->entered_by }}
                                        </td>
                                        <td colspan="1">
                                        <label>Entry Date</label>
                                        </br>
                                        {{ date('d-m-Y', strtotime($Obj->entry_date)) }}
                                        </td>
                                    </tr>
                                                          
                                </tbody>```
                              </table>
                            </div>
                            @php
                                $j = $j + 1;
                            @endphp
                            @endforeach
                          </div><!-- ./End of Tab div -->
                        </div><!-- /.card-body -->
                      </div>
                      <!-- ./card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!--Divider-->
                  <hr class="border-b-2 border-warning my-2 mx-2">
                  <!--Divider-->
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
        </div> 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



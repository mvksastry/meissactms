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
                      Clinical Reports
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
                      <div class="card">
                        <div class="card-header d-flex p-0">
                          <h3 class="card-title p-3">Current Reports</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          @if(count($current_files) > 0 )
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th align="center">Rep Desc</th>
                                  <th align="center">Rep Status</th>
                                  <th align="center">Uploaded By</th>
                                  <th align="center">Uploaded On</th>
                                  <th align="center">Updated On</th>
                                  <th align="center">Action</th>
                                </tr>
                              </thead>
                              <tbody> 
                                @foreach($current_files as $curfile)
                                  <tr>
                                    <td>
                                        {{ $curfile->report_description }}
                                    </td>
                                    <td>
                                        {{ ucfirst($curfile->report_status) }}
                                    </td>
                                    <td>
                                        {{ $curfile->uploaded_by }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($curfile->date_created)) }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($curfile->updated_at)) }}
                                    </td>
                                    <td>
                                        <button wire:click="fnDownloadReport('{{ $curfile->clinicalreport_id }}')" class="btn btn-info font-normal mt-0 rounded">Download</button>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          @else
                            <table id="userIndex2" class="table table-sm table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th align="center">No Information Retrieved</th>
                                </tr>
                              </thead>
                              <tbody> 
                              </tbody>
                            </table>
                          @endif
                        </div>
                      </div>
                    </div>
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
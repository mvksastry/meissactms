          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">On-Boarded Patients</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (count($obPatients) > 0)
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Status</th>
                        <th style="width: 300px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($obPatients as $row)
                        <tr>
                          <td>#</td>
                          <td>{{ $row->ob_status }}</td>
                          <td>
                            <a href="/edit-patients" button class="btn btn-block btn-warning rounded" type="button"><i
                                class="ion ion-person"></i>&nbsp
                              More Info</button></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No Data To Show</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Follow-Up Patients</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                @if (count($xfuPats) > 0)
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                        <th style="width: 300px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($xfuPats as $row)
                        <tr>
                          <td>1.</td>
                          <td>{{ ucfirst($row->status) }}</td>
                          <td>
                            <a href="/patient-followup" button class="btn btn-block btn-warning rounded"
                              type="button"><i class="ion ion-person"></i>&nbsp
                              More Info</button></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No Data to Show</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                @endif
              </div>
              <!-- /.card-body -->
            </div> <!-- end of card -->
            <!-- /.card -->
          </div> <!-- end of col -->

<section class="col-lg-12 connectedSortable">
  <div class="container-fluid">
    <!-- COLOR PALETTE -->
    <div class="card card-default color-palette-box">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-tag"></i>
          Pending Tasks
        </h3>
      </div>
      <div class="card-body">
        <!-- /.col-12 -->
        <!-- /.col-12 -->
        <div class="row">

          @if (count($forApproval) > 0)
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 30%;">Task</th>
                  <th style="width: 30%;">For Attention</th>
                  <th style="width: 30%;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <strong>Patients Waiting For Approval</strong><strong></strong>
                  </td>
                  <td>
                    <label class="text-danger"><strong>{{ count($forApproval) }}</strong></label>
                  </td>
                  <td>
                    <a href="/patient-information" button class="btn btn-block btn-warning rounded" type="button"><i
                        class="ion ion-person"></i>&nbsp
                      More Info</button></a>
                  </td>
                </tr>
              </tbody>
            </table>
          @else
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th>No Actionables: Patient Data Approval</th>
                </tr>
              </thead>
            </table>
          @endif

          @if (count($fuPatients) > 0)
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 30%;">Task</th>
                  <th style="width: 30%;">For Attention</th>
                  <th style="width: 30%;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Follow-up Data Entry Patients Waiting
                  </td>
                  <td>
                    <label class="text-danger"><strong>{{ count($fuPatients) }}</strong></label>
                  </td>
                  <td>
                    <a href="/patient-followup" button class="btn btn-block btn-warning rounded" type="button"><i
                        class="ion ion-person"></i>&nbsp
                      More Info</button></a>
                  </td>
                </tr>
              </tbody>
            </table>
          @else
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th>No Actionables: Follow-up Patient Data</th>
                </tr>
              </thead>
            </table>
          @endif

          @if (count($sealed) > 0)
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 30%;">Task</th>
                  <th style="width: 30%;">For Attention</th>
                  <th style="width: 30%;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    At Enrollment Stage
                  </td>
                  <td>
                    <label class="text-danger"><strong>{{ count($sealed) }}</strong></label>
                  </td>
                  <td>
                    <a href="/home-enrollment" button class="btn btn-block btn-warning rounded" type="button"><i
                        class="ion ion-person"></i>&nbsp
                      More info</button></a>
                  </td>
                </tr>
              </tbody>
            </table>
          @else
            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th>No Actionables: Patient Enrollment</th>
                </tr>
              </thead>
            </table>
          @endif
        </div>
        <!-- /.row -->
        <!--Divider-->
        <hr class="border-b-2 border-warning my-2 mx-2">
        <!--Divider-->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- START ALERTS AND CALLOUTS -->
  </div><!-- /.container-fluid -->
</section>

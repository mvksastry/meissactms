<div class="container-fluid">
  <!-- COLOR PALETTE -->
  <div class="card card-default color-palette-box">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-tag"></i>
        Pending/Up Coming Tasks
      </h3>
    </div>
    <div class="card-body">
      <!-- /.col-12 -->
      <!-- /.col-12 -->
      <div class="row">

        @if (count($sealed) > 0)
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>Task</th>
                <th>For Attention</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong>Patients @ Enrollment Stage</strong>
                </td>
                <td>
                  <label class="text-danger"><strong></strong></label>
                </td>
                <td>
                  <a href="/home-enrollment" button class="btn btn-block btn-warning rounded" type="button"><i
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
                <th>No Actionables: Patient Enrollment </th>
              </tr>
            </thead>
          </table>
        @endif

        @if (count($qaInpFlag) > 0)
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>Task</th>
                <th>For Attention</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong>Patients or Near Enrollment Stage</strong>
                </td>
                <td>
                  <label class="text-danger"><strong></strong></label>
                </td>
                <td>
                  <a href="/home-enrollment" button class="btn btn-block btn-warning rounded" type="button"><i
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
                <th>No Actionables: Patient/Samples Not Reached Yet </th>
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

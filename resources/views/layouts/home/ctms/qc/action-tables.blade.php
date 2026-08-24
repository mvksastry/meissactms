<!-- COLOR PALETTE -->
<div class="card card-default color-palette-box">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fas fa-tag"></i>
      Pending Tasks
    </h3>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content p-0">
      <!-- /.col-12 -->
      <!-- /.col-12 -->
    </div>
    <!-- /.row -->
    <!--Divider-->
    <hr class="border-b-2 border-warning my-2 mx-2">
    <!--Divider-->
    @php
      $code = config('ctms.steps');
    @endphp
    <!-- DIRECT CHAT -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Immediate Attention</h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <!-- Conversations are loaded here -->
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
        <hr class="border-b-2 border-warning my-2 mx-2">

        @if (count($qcInpFlag) > 0)
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
        <hr class="border-b-2 border-warning my-2 mx-2">

        <hr class="border-b-2 border-warning my-2 mx-2">

        <hr class="border-b-2 border-warning my-2 mx-2">

      </div>
    </div>
    <!-- TO DO List -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="ion ion-clipboard mr-1"></i>
          Patient Data Status
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- START ALERTS AND CALLOUTS -->

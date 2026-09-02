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
        @if (count($obPatients) > 0)
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 55%;">Task</th>
                <th style="width: 20%;">For Attention</th>
                <th style="width: 25%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong></strong> <strong></strong>PreEnroll: Mark As Complete (M A C) Waiting
                </td>
                <td>
                  <label class="text-danger"><strong>{{ count($obPatients) }}</strong></label>
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
                <th>No Actionables: On-Boarded Patient Data</th>
              </tr>
            </thead>
          </table>
        @endif
        <hr class="border-b-2 border-warning my-2 mx-2">
        @if (count($fuPatients) > 0)
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 55%;">Task</th>
                <th style="width: 20%;">For Attention</th>
                <th style="width: 25%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Follow-up: Mark As Complete (M A C) Waiting
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
        <hr class="border-b-2 border-warning my-2 mx-2">

      </div>
    </div>
    <!-- TO DO List -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="ion ion-clipboard mr-1"></i>
          Open soon If Data Available
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

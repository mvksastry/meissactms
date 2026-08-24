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
                <th style="width: 30%;">Task</th>
                <th style="width: 30%;">For Attention</th>
                <th style="width: 30%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong>O</strong>n <strong>B</strong>oarded Patients Waiting For Entry of Data
                </td>
                <td>
                  <label class="text-danger"><strong>{{ count($obPatients) }}</strong></label>
                </td>
                <td>
                  <a href="/edit-patients" button class="btn btn-block btn-warning rounded" type="button"><i
                      class="ion ion-person"></i>&nbsp
                    Go To Enter</button></a>
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
                    Go To Enter</button></a>
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

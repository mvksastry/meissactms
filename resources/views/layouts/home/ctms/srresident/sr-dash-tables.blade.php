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
                  <td>{{ $row->name }}</td>
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
        <hr class="border-b-2 border-warning my-2 mx-2">
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
                    <a href="/patient-followup" button class="btn btn-block btn-warning rounded" type="button"><i
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
                <th>No Data to Show</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
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
          Will Open with Data IF available
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

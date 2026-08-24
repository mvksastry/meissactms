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
        @if (count($pending) > 0)
          <table class="table table-sm">
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
                  <strong>Pending: On-Boarding Approval</strong> <strong></strong>
                </td>
                <td>
                  <label class="text-danger"><strong>{{ count($pending) }}</strong></label>
                </td>
                <td>
                  <a href="/new-patient-onboarding" button class="btn btn-block btn-warning rounded" type="button"><i
                      class="ion ion-person"></i>&nbsp
                    More Info</button></a>
                </td>
              </tr>
            </tbody>
          </table>
        @else
          <table class="table table-sm">
            <thead>
              <tr>
                <th>No Actionables: On Boarding Approval</th>
              </tr>
            </thead>
          </table>
        @endif
        <hr class="border-b-2 border-warning my-2 mx-2">
        @if (count($drafts) > 0)
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
                  <strong>Patients @ Draft status
                    (Data stages may vary)</strong><strong></strong>
                </td>
                <td>
                  <label class="text-danger"><strong>{{ count($drafts) }}</strong></label>
                </td>
                <td>
                </td>
              </tr>
            </tbody>
          </table>
        @else
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>None @ Draft Status</th>
              </tr>
            </thead>
          </table>
        @endif
        <hr class="border-b-2 border-warning my-2 mx-2">
        @if (count($approved) > 0)
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
                  <strong>Data For Mark as Sealed</strong>
                </td>
                <td>
                  <label class="text-danger"><strong>{{ count($approved) }}</strong></label>
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
                <th>No Actionables: Mark As Sealed</th>
              </tr>
            </thead>
          </table>
        @endif
        <hr class="border-b-2 border-warning my-2 mx-2">
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
                  <strong>Patients @ Enrollment Stage</strong>
                </td>
                <td>
                  <label class="text-danger"><strong>{{ count($sealed) }}</strong></label>
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
                <th>No Actionables: No Patient Data Sealed </th>
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
                  <a href="/mark-as-complete" button class="btn btn-block btn-warning rounded" type="button"><i
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
        @if (count($allPatients) > 0)
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Data Status/Date</th>
                <th>Enroll Status/Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($allPatients as $patient)
                <tr>
                  <td>
                    {{ $patient->name }}
                  </td>
                  <td>
                    <label class="text-danger"><strong>{{ ucfirst($patient->status) }} /
                        {{ $patient->status_date }}</strong></label>
                  </td>
                  <td>
                    <label class="text-danger"><strong>
                        @if ($patient->enrolled != null)
                          {{ ucfirst($code[$patient->enrolled->stage_code]) }} /
                          {{ $patient->enrolled->status_date }}
                        @else
                          No Data
                        @endif
                      </strong></label>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>No Info Available</th>
              </tr>
            </thead>
          </table>
        @endif
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- START ALERTS AND CALLOUTS -->

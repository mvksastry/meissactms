<div>

  {{-- Stop trying to control. --}}
  {{-- The Master doesn't talk, he acts. --}}
  {{-- In work, do what you enjoy. --}}
  {{-- The whole world belongs to you. --}}
  <!-- Content Wrapper. Contains page content -->

  <section class="content p-2">
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
      <div class="card card-default color-palette-box">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-tag"></i>
            Closure Request Form
          </h3>
        </div>
        <div class="card-body">
          <!-- /.col-12 -->
          <!-- /.col-12 -->
          <div class="row">

            <table id="userIndex2" class="table table-sm table-bordered table-hover">
              <thead>
                <tr>
                  <th colspan="3"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <label>Name</label>
                    </br>
                    {{ $patientInfo->name }}
                  </td>
                  <td>
                    <label>OPD ID</label>
                    </br>
                    {{ $patientInfo->opd_id }}
                  </td>
                  <td>
                    <label>IPD ID</label>
                    </br>
                    {{ $patientInfo->ipd_id }}
                  </td>

                  <td>
                    <label>OB Initiated By</label>
                    </br>
                    {{ $patientInfo->ob_initiated_by }}
                  </td>

                  <td>
                    <label>OB Approved By</label>
                    </br>
                    {{ $patientInfo->ob_approved_by }}
                  </td>
                </tr>

                <tr>
                  <td>
                    <label>Status Code</label>
                    </br>
                    {{ $patientInfo->status_code }}
                  </td>
                  <td>
                    <label>Status</label>
                    </br>
                    {{ $patientInfo->status }}
                  </td>
                  <td>
                    <label>Status Date</label>
                    </br>
                    {{ $patientInfo->status_date }}
                  </td>

                  <td>
                    <label>SKLS Unique ID</label>
                    </br>
                    {{ $enrollInfo->patient_unique_id }}
                  </td>

                  <td>
                    <label>Transplant Status</label>
                    </br>
                    {{ $enrollInfo->transplant_status }}
                  </td>
                </tr>

                <tr>
                  <td colspan="5">
                    <label>Closure Comment</label>
                    </br>
                    {{ $patientInfo->closure_comment }}
                  </td>
                </tr>

                <tr>
                  <td>
                    <label>Date Closed</label>
                    </br>
                    {{ $patientInfo->date_closed }}
                  </td>
                  <td>
                    <label>Closed By</label>
                    </br>
                    {{ $patientInfo->closed_by }}
                  </td>

                  <td>
                    <label>Final Status</label>
                    </br>
                    {{ ucfirst($patientInfo->final_status) }}
                  </td>

                  <td>

                  </td>
                  <td>

                  </td>
                </tr>
              </tbody>
            </table>

            {{-- The whole world belongs to you. --}}
            @if ($patientInfo->status == 'sealed' || $patientInfo->status == 'closed')
              <table id="userIndex2" class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="3"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="2">
                      <label>Closure Comment</label>
                      <input wire:model.defer="form.closure_comment" id="closure_comment" type="text" value="null"
                        class="form-control" placeholder="Comment">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="1">
                      <label>Closure Initiated By</label>
                      <input wire:model="form.initiated_by" id="initiated_by" type="text" class="form-control"
                        placeholder="Initiated By">
                    </td>
                    <td colspan="1">
                      <label>Date Initiated</label>
                      <input wire:model="form.date_initiated" id="date_initiated" type="date" value="null"
                        class="form-control" placeholder="Date Initiated">
                    </td>
                  </tr>
                </tbody>
              </table>
            @endif

          </div>
          <!-- /.row -->
          @hasrole('ctms_incharge')
            @if ($patientInfo->status == 'sealed')
              <button wire:click="initiateDataClosure()" class="btn btn-block btn-warning rounded" type="button"><i
                  class="ion ion-person"></i>&nbsp
                Initiate Closure</button>
            @endif
          @endhasrole

          @hasrole('director')
            @if ($patientInfo->status == 'closed')
              <button wire:click="completePatientDataClosure()" class="btn btn-block btn-warning rounded"
                type="button"><i class="ion ion-person"></i>&nbsp
                Complete Closure</button>
            @endif
          @endhasrole

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

  <!-- /.content -->

  <!-- /.content-wrapper -->

</div>

<div>

  <section class="content p-2">
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
      <div class="card card-default color-palette-box">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-tag"></i>
            Data Archival Preparation
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
                @if ($curArchieves->status == 1)
                  <tr>
                    <td colspan="4">
                      {{ $curArchieves->accessed_by }}

                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button wire:click="downloadPatentDataZipArchieve('{{ $patientInfo->patient_uuid }}')"
                        class="btn btn-block btn-warning rounded" type="button"><i class="ion ion-person"></i>&nbsp
                        Download Archieve</button>
                    </td>
                    <td>

                    </td>

                    <td>
                    </td>

                    <td>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>

            {{-- The whole world belongs to you. --}}

          </div>
          <!-- /.row -->
          @if ($curArchieves->status != 1)
            <button wire:click="preparePatentDataZipArchieve('{{ $patientInfo->patient_uuid }}')"
              class="btn btn-block btn-warning rounded" type="button"><i class="ion ion-person"></i>&nbsp
              Prepare Archieve</button>
          @endif
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

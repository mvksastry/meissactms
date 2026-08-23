<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title">QC Status</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>Reports</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($enFileObj as $row)
                <tr>
                  <td>
                    <button wire:click="fnDownLoadQCfile('{{ $row->file_uuid }}')"
                      class='btn btn-success text-white font-normal rounded'>
                      {{ ucfirst($row->report_category) }} </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>Other</th>
              </tr>
            </thead>

            <tr>
              <td>
                {{ $enrObj->qc_other_infos }}
              </td>
            </tr>
            <tr>
              <td>
                {{ $enrObj->qc_enrollment_comment }}
              </td>
            </tr>
            <tr>
              <td>
                {{ $step_code[$enrObj->qc_status_code] }}
              </td>
            </tr>
            <tr>
              <td>
                {{ $enrObj->qc_infos_entered_by }}
              </td>
            </tr>
            <tr>
              <td>
                {{ $enrObj->qc_infos_date_entered }}
              </td>
            </tr>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

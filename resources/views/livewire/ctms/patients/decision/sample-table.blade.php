<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title">Discectomy Sample Status</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <table id="userIndex2" class="table table-sm table-bordered table-hover">
            <thead>
              <tr>
                <th>Item</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sample Description</td>
                {{ $enrObj->discectomy_sample_desc }}
                </td>
              </tr>
              <tr>
                <td>Number of Samples</td>
                <td>
                  {{ $enrObj->discectomy_sample_number }}
                </td>
              </tr>
              <tr>
                <td>Comment</td>
                <td>
                  {{ $enrObj->discectomy_sample_comments }}
                </td>
              </tr>
              <tr>
                <td>Status code</td>
                <td>
                  {{ $step_code[$enrObj->discec_sample_status_code] }}
                </td>
              </tr>
              <tr>
                <td>Entered By</td>
                <td>
                  {{ $enrObj->discectomy_sample_info_entered_by }}
                </td>
              </tr>
              <tr>
                <td>Date</td>
                <td>
                  {{ $enrObj->discectomy_sample_info_date_entered }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

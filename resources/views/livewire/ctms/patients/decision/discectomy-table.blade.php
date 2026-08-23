<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title">Discectomy Status</h3>
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
                <td>Discectomy Date</td>
                <td>
                  {{ $enrObj->discectomy_date }}
                </td>
              </tr>
              <tr>
                <td>Surgenos</td>
                <td>
                  {{ $enrObj->surgeons_names }}
                </td>
              </tr>
              <tr>
                <td>Other</td>
                <td>
                  {{ $enrObj->discectomy_other_info }}
                </td>
              </tr>
              <tr>
                <td>Comment</td>
                <td>
                  {{ $enrObj->discectomy_comments }}
                </td>
              </tr>
              <tr>
                <td>Status code</td>
                <td>
                  {{ $step_code[$enrObj->discec_status_code] }}
                </td>
              </tr>
              <tr>
                <td>Entered By</td>
                <td>
                  {{ $enrObj->disc_info_entered_by }}
                </td>
              </tr>
              <tr>
                <td>Date</td>
                <td>
                  {{ $enrObj->disc_info_date_entered }}
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

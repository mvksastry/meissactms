<div class="col-md-12">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title">Summary</h3>
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
            <tdead>
              <tr>
                <th>Item</th>
                <th>Description</th>
              </tr>
              </thdead>
              <tbody>
                <tr>
                  <td>Date Created</td>
                  <td>
                    {{ date('d-m-Y H:i:s', strtotime($enrObj->created_at)) }}
                  </td>
                </tr>
                <tr>
                  <td>Date Last Edited</td>
                  <td>
                    {{ date('d-m-Y H:i:s', strtotime($enrObj->updated_at)) }}
                  </td>
                </tr>
                <tr>
                  <td>Final Status code</td>
                  <td>
                    {{ ucfirst($step_code[$enrObj->stage_code]) }}
                  </td>
                </tr>
                <tr>
                  <td>Failed Steps</td>
                  <td>
                    @if ($go)
                      ✅ Failed Steps Not Found:
                    @else
                      ❌ Failed Steps Found
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Entered Date</td>
                  <td>
                    {{ $enrObj->qa_infos_date_entered }}
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

  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-exclamation-triangle"></i>
            Alerts
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($sysAlertDanger)
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{ $sysAlertDanger }}
          </div>
          @endif
          @if($sysAlertInfo)
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i> Alert!</h5>
            {{ $sysAlertInfo }}
          </div>
          @endif
          @if($sysAlertWarning)
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
            {{ $sysAlertWarning }}
          </div>
          @endif
          @if($sysAlertSuccess)
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ $sysAlertSuccess }}
          </div>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
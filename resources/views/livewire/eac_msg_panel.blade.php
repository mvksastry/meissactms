  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Callout
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if($comDanger)
          <div class="callout callout-danger">
            <h5>Major Issue!</h5>
            <p>{{ $comDanger}}</p>
          </div>
          @endif
          @if($comInfo)
          <div class="callout callout-info">
            <h5>For Information</h5>
            <p>{{ $comInfo }}</p>
          </div>
          @endif
          @if($comWarning)
          <div class="callout callout-warning">
            <h5>Warning!</h5>
            <p>{{ $comWarning }}</p>
          </div>
          @endif
          @if($comSuccess)
          <div class="callout callout-success">
            <h5>Success!</h5>
            <p>{{ $comSuccess }}</p>
          </div>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- END ALERTS AND CALLOUTS -->
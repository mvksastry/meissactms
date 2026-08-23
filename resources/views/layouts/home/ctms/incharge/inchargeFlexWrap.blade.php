@if (count($forApproval) > 0)
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h4>{{ count($forApproval) }}</h4>
        <p>For Approval</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="/patient-information" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h4><sup style="font-size: 20px">0</sup></h4>

        <p>Follow-up: Pending</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="/patient-followup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endif
<!-- ./col -->
@if (count($sealed) > 0)
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h4>
          @if (count($sealed) > 0)
            {{ count($sealed) }}
          @else
            0
          @endif
        </h4>

        <p>@ Enrollment Stage</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="/home-enrollment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h4>0</h4>
        <p>Follow-Up: M A C</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="/mark-as-complete" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endif
<!-- ./col -->

@if (count($obPatients) > 0)
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ count($obPatients) }}</h3>
        <p>On-Boarded M A C</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="/edit-patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><sup style="font-size: 20px"></sup></h3>

        <p>Patients: M A C</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="/patient-followup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endif
<!-- ./col -->
<!-- ./col -->

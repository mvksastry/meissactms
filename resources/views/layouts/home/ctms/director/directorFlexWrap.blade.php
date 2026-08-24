@if (count($pending) > 0)
  <a href="/new-patient-onboarding" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($pending) }}</span>
    <i class="ion ion-person"></i> On-Board: M A C
  </a>
@endif
<!-- ./col -->
@if (count($approved) > 0)
  <a href="/patient-information" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($approved) }}</span>
    <i class="ion ion-person"></i>@ Seling Stage
  </a>
@endif
<!-- ./col -->
@if (count($sealed) > 0)
  <a href="/home-enrollment" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($sealed) }}</span>
    <i class="ion ion-person"></i>@ Enrollment
  </a>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <a href="/mark-as-complete" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($fuPatients) }}</span>
    <i class="ion ion-person"></i>Follow-Up: M A C
  </a>
@endif
<!-- ./col -->

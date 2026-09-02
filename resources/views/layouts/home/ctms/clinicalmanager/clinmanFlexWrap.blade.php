@if (count($obPatients) > 0)
  <a href="/patient-information" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($obPatients) }}</span>
    <i class="ion ion-person"></i>PreEnroll: M A C
  </a>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <a href="/patient-followup" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($fuPatients) }}</span>
    <i class="ion ion-person"></i>Follow-up: M A C
  </a>
@endif

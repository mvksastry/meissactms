@if (count($forApproval) > 0)
  <a href="/patient-information" class="btn btn-app bg-warning mr-4">
    <span class="badge bg-info">count($forApproval)</span>
    <i class="fas fa-envelope"></i> For Approval
  </a>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <a href="/patient-information" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($fuPatients) }}</span>
    <i class="ion ion-person"></i> Under Follow-Up
  </a>
@endif
<!-- ./col -->
@if (count($sealed) > 0)
  <a href="/home-enrollment" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($sealed) }}</span>
    <i class="ion ion-person"></i> Data Sealed
  </a>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <a href="/mark-as-complete" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($fuPatients) }}</span>
    <i class="ion ion-person"></i> Follow-Up: M A C
  </a>
@endif
<!-- ./col -->

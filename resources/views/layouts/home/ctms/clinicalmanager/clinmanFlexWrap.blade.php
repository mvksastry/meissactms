@if (count($obPatients) > 0)
  <a href="/edit-patients" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($obPatients) }}</span>
    <i class="ion ion-person"></i>On-Boarded M A C
  </a>
@endif
<!-- ./col -->
@if (count($fuPatients) > 0)
  <a href="/patient-followup" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($fuPatients) }}</span>
    <i class="ion ion-person"></i>Patients: M A C
  </a>
@endif

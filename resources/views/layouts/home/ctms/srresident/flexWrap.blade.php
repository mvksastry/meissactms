@if (count($obPatients) > 0)
  <a href="/edit-patients" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($obPatients) }}</span>
    <i class="ion ion-person"></i>On-Boarded
  </a>
@endif
<!-- ./col -->
@if (count($xfuPats) > 0)
  <a href="/edit-patients" class="btn btn-app bg-info mr-4">
    <span class="badge bg-danger">{{ count($xfuPats) }}</span>
    <i class="ion ion-person"></i>Follow-Up: Entry
  </a>
@endif
<!-- ./col -->

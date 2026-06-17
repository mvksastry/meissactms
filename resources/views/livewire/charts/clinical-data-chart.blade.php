<div wire:ignore>
        <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Clinical Data of Patient ID: </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
        
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
        </div>

</div>
@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets
@script
    <script>
    const ctx = document.getElementById('barChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        datasets: [{
            label: '# Clinical Parameters',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
    </script>
    @endscript






        
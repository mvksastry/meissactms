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
    <script src="https://www.chartjs.org/samples/2.9.4/utils.js"></script>
@endassets
@script
    <script>
    const ctx = document.getElementById('barChart');

const data = [{x: 1, y: 13}, 
              {x: 1, y: 16},
              {x: 2, y: 16}, 
              {x: 2, y: 23}];

    new Chart(ctx, {
        type: 'scatter',
        //labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        data: {
        
        
        datasets: [{
          label: 'Clinical Parameters',
          data: [
              {x: '0', y: 0}, 
              {x: 'Hb', y: 13}, 
              {x: 'Hb', y: 16},
              {x: 'Hb', y: 15},
              {x: 'Hb', y: 14},
              {x: 'Eiso', y: 16}, 
              {x: 'Eiso', y: 23},
              {x: 'Baso', y: 2}, 
              {x: 'Baso', y: 3}],
          borderColor: 'rgb(0, 99, 132)',
          backgroundColor: 'rgb(255, 99, 132)',
        }]
        /*
        datasets: [{
            label: '# Clinical Parameters',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
        */
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Chart.js Scatter Chart'
            }
          },
          scales: {
                    x: {
              type: 'category',
              position: 'bottom'
              },
              y: {
              beginAtZero: true
              }
          }
        }
    });
    
    </script>
    @endscript






        
<div wire:ignore>
  <div class="row">

    <div class="col-3">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Hemoglobin </h3>
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
            <canvas id="hbChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Eisonophils </h3>
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
            <canvas id="eisoChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Basophils </h3>
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
            <canvas id="basoChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">CRP </h3>
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
            <canvas id="crpChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
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
    const ctxHb = document.getElementById('hbChart');
    const data = [{x: 1, y: 13}, 
                  {x: 1, y: 16},
                  {x: 2, y: 16}, 
                  {x: 2, y: 23}];

    new Chart(ctxHb, {
        type: 'scatter',
        //labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        data: {
          datasets: [{
            label: 'Hemoglobin',
            data: [
                {x: '0', y: 0}, 
                {x: 'Hb', y: 13}, 
                {x: 'Hb', y: 16},
                {x: 'Hb', y: 15},
                {x: 'Hb', y: 14}],
            borderColor: 'rgb(0, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Hemoglobin'
            },
            ticks: {
              major: 'enabled',
              display: true,
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


    const ctxEiso = document.getElementById('eisoChart');

    new Chart(ctxEiso, {
        type: 'scatter',
        //labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        data: {
          datasets: [{
            label: 'Clinical Parameters',
            data: [
                {x: '0', y: 0}, 
                {x: 'Eiso', y: 16}, 
                {x: 'Eiso', y: 23}],
            borderColor: 'rgb(0, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Eisonophils'
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

    const ctxBaso = document.getElementById('basoChart');

    new Chart(ctxBaso, {
        type: 'scatter',
        //labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        data: {
          datasets: [{
            label: 'Clinical Parameters',
            data: [
                {x: '0', y: 0}, 
                {x: 'Baso', y: 2}, 
                {x: 'Baso', y: 3}],
            borderColor: 'rgb(0, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Basophils'
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


    const ctxCRP = document.getElementById('crpChart');

    new Chart(ctxCRP, {
        type: 'scatter',
        //labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        data: {
          datasets: [{
            label: 'CRP',
            data: [
                {x: '1', y: 1.4}, 
                {x: '1', y: 2.93},
                {x: '1', y: 3.3},
                {x: '1', y: 3.4},
                {x: '1', y: 4.4},
                {x: '1', y: 2.4},
                {x: '1', y: 1.9}],
            borderColor: 'rgb(0, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'CRP'
            }
          },
        scales: {
                  x: {
            min: 0,
            max: 2,
            type: 'linear',
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






        
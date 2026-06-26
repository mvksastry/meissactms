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
          <h3 class="card-title">CRP Days </h3>
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
          <h3 class="card-title">CRP - Date </h3>
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

////////////////////////////////////////////////////////////
<?php
$crpvals = $chartData;
$xlabels = json_encode($crpvals['labels']);
$ydata = json_encode($crpvals['datasets'][0]['data']);
$crpvals = json_encode($yaxis);
//dd($crpvals, $xlabels, $ydata, $yaxis);
?>
    const ctxEiso = document.getElementById('eisoChart');
    const xaxis = <?php echo $xlabels; ?>;
    const crpx  = <?php echo $ydata; ?>;
    const crpc  = <?php echo $crpvals; ?>;
    
    /*
                    for (var i in crpx) {
                        crpd.push(crpx[i]);
                       
                    }
  */
  //console.log(xaxis);
  //console.log(crpx);


      new Chart(ctxEiso, {
        type: 'line',
        
        data: {
          labels: xaxis,

          datasets: [
            {
              
              label: 'CRP',
              data: crpc,
              borderColor: 'rgb(0, 99, 132)',
              backgroundColor: 'rgb(255, 99, 132)',
            }
          ]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'CRP - Days'
            }
          },
        scales: {
            x: {
            display: true,
            title: {
              display: true,
              text: 'Days'
            },
            position: 'bottom'
            },
            y: {
            beginAtZero: true,
              title: {
                display: true,
                text: 'CRP-mg/L',
                color: '#191',
                font: {
                  family: 'Times',
                  size: 14,
                  style: 'normal',
                  lineHeight: 1.2
                }
              }


            }
        }
      }
    });
    
      

/////////////////////////////////////////////////////////////////
    const ctxBaso = document.getElementById('basoChart');
    const labels = ['2025-06-12', '2025-09-12', '2025-12-14', '2026-12-17', 
                  '2026-01-29', '2026-03-02', '2026-06-22'];
    const crpDatedata = [1.4, 2.93, 3.3, 3.4, 4.4, 2.4, 1.9];

    const dataPoints1 = [
        { x: '2025-06-12', y: 1.4 },        
        { x: '2025-09-12', y: 2.93 },
        { x: '2025-12-14', y: 3.3 },
        { x: '2026-12-17', y: 3.4 },
        { x: '2026-01-29', y: 4.4 },
        { x: '2026-03-02', y: 2.4 },
        { x: '2026-06-22', y: 1.9 }
    ];

    const dataPoints2 = [
        { x: '2025-06-12', y: 2.4 },        
        { x: '2025-09-12', y: 1.93 },
        { x: '2025-12-14', y: 5.3 },
        { x: '2026-12-17', y: 5.4 },
        { x: '2026-01-29', y: 2.2 },
        { x: '2026-03-02', y: 1.4 },
        { x: '2026-06-22', y: 0.9 }
    ];


    new Chart(ctxBaso, {
        type: 'line',
        data: {
          
          datasets: [
            {
            label: labels,
            data: dataPoints1,
            borderColor: 'rgb(0, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
            },
            {
            label: labels,
            data: dataPoints2,
            borderColor: 'rgb(0, 176, 132)',
            backgroundColor: 'rgb(255, 140, 132)',
            }
          ],
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
            display: true,
            title: {
              display: true,
              text: 'Date'
            },
            position: 'bottom'
            },
            y: {
            beginAtZero: true,
              title: {
                display: true,
                text: 'CRP-mg/L',
                color: '#191',
                font: {
                  family: 'Times',
                  size: 14,
                  style: 'normal',
                  lineHeight: 1.2
                }
              }
            }
        }
      }
    });


    const ctxCRP = document.getElementById('crpChart');

    new Chart(ctxCRP, {
        type: 'scatter',
        //labels: ['Hb', 'WBC', 'RBC', 'Baso', 'Neutrophils', 'Eisono'],
        data: {
          datasets: [
            {
            label: 'P1',
            data: [
                {x: '1', y: 1.4}, 
                {x: '1', y: 2.93},
                {x: '1', y: 3.3},
                {x: '1', y: 3.4},
                {x: '1', y: 4.4},
                {x: '1', y: 2.4},
                {x: '1', y: 1.9}
              ],
            borderColor: 'rgb(0, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132)',
          },
          {
            label: 'P2',
            data: [
                {x: '2', y: 2.4}, 
                {x: '2', y: 1.93},
                {x: '2', y: 5.3},
                {x: '2', y: 5.4},
                {x: '2', y: 2.2},
                {x: '2', y: 1.4},
                {x: '2', y: 0.9}
              ],
            borderColor: 'rgb(0, 176, 132)',
            backgroundColor: 'rgb(0, 0, 0)',
          }
        
        
        ]
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
            max: 4,
            type: 'linear',
            position: 'bottom'
            },
            y: {
            beginAtZero: true,
              title: {
                display: true,
                text: 'CRP-mg/L',
                color: '#191',
                font: {
                  family: 'Times',
                  size: 14,
                  style: 'normal',
                  lineHeight: 1.2
                }
              }


            }
        }
      }
    });


    
    </script>
    @endscript






        
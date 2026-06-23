<?php

namespace App\Livewire\Charts;

use Livewire\Component;

use App\Traits\Base;

class ClinicalDataChart extends Component
{
    use Base;

    public $chartData;

    public $chart_data;

    public $xaxis = [], $yaxis = [];

    public $dates, $days;

    public function mount()
    {
        $this->dates = ['2025-06-12', '2025-09-12', '2025-12-14', '2026-12-17', 
                  '2026-01-29', '2026-03-02', '2026-06-22'];

        $ref_date = $this->dates[0];

        for($i = 0; $i < count($this->dates); $i++)
        {
            $this->days[] = $this->daysBetween($ref_date, $this->dates[$i]);
        }
        //dd($this->days);

        $crp_values = [1.4, 2.93, 3.3, 3.4, 4.4, 2.4, 1.9];

        for($i = 0; $i < count($this->dates); $i++)
        {
            $x = $this->days[$i];
            $y = $crp_values[$i];
            $this->xaxis[] = $x;
            $this->yaxis[] = $y;

            $pair['x'] = $x;
            $pair['y'] = $y;
            $this->chart_data[] = json_encode($pair);
        }
       //$crp = $this->chart_data;
       //dd($this->xaxis, $this->yaxis);
        $this->chartData = [
            'labels' => $this->days,
            'datasets' => [
                [
                    'label' => 'CRP',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $this->chart_data,
                ],
            ],
        ];
    }

    public function updateChart()
    {
        //dd("working");
        $this->chartData['datasets'][0]['data'] = [75, 69, 90, 91, 66];

        //$this->dispatch('updateChart', $this->chartData);
    }

    public function render()
    {
        return view('livewire.charts.clinical-data-chart');
    }
}

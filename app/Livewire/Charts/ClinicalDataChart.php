<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class ClinicalDataChart extends Component
{
    public $chartData;

    public $chart_data;

    public function mount()
    {
        $this->chartData = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => [65, 59, 80, 81, 56],
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

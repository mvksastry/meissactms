<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\VaScore;

class VaScoreDataTable extends DataTableComponent
{
    protected $model = VaScore::class;
    // Example: Pass an ID to filter by
    public string $patient_uuid;
    public string $data_type;

    public function mount(string $patient_uuid, string $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        $query = VaScore::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', $this->data_type);
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('vascore_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("Intensity", "intensity")
                ->sortable(),
            Column::make("Location", "location")
                ->sortable(),
            Column::make("Onset", "onset")
                ->sortable(),
            Column::make("Duration", "duration")
                ->sortable(),
            Column::make("Variation", "variation")
                ->sortable(),
            Column::make("Quality", "quality")
                ->sortable(),
            Column::make("VAS Scale", "vas_scale")
                ->sortable(),
            Column::make("FPR Scale", "fpr_scale")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }    
}

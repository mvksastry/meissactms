<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\SensoryExamination;

class SensoryExamsDataTable extends DataTableComponent
{
    protected $model = SensoryExamination::class;
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
        $query = SensoryExamination::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', $this->data_type);
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('sensory_exam_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("lL1", "lL1")
                ->sortable(),
            Column::make("lL2", "lL2")
                ->sortable(),
            Column::make("lL3", "lL3")
                ->sortable(),
            Column::make("lL4", "lL4")
                ->sortable(),
            Column::make("lL5", "lL5")
                ->sortable(),
            Column::make("lS1", "lS1")
                ->sortable(),
            Column::make("rL1", "rL1")
                ->sortable(),
            Column::make("rL2", "rL2")
                ->sortable(),
            Column::make("rL3", "rL3")
                ->sortable(),
            Column::make("rL4", "rL4")
                ->sortable(),
            Column::make("rL5", "rL5")
                ->sortable(),
            Column::make("rS1", "rS1")
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

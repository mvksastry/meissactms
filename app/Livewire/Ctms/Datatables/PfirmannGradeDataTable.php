<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\PfirmannGrade;

class PfirmannGradeDataTable extends DataTableComponent
{
    protected $model = PfirmannGrade::class;
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
        $query = PfirmannGrade::query();
        // Apply WHERE clause if patient_uuid is set
        if ($this->data_type) 
        {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', '=', $this->data_type);
        }else{
            $query->where('patient_uuid', $this->patient_uuid);
        }
        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('pfirmann_grade_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),
            Column::make("Modified Pfirmann Grade", "modified_pfirman_grade")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

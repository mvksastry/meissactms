<?php

namespace App\Livewire\Ctms\Datatables\Clinicals;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Clinicals\UrineRoutine;

class UrineRoutineDataTable extends DataTableComponent
{
    protected $model = UrineRoutine::class;
    // Example: Pass an ID to filter by
    public $patient_uuid;
    public $data_type;

    public function mount($patient_uuid, $data_type)
    {
        $this->patient_uuid = $patient_uuid;
        $this->data_type = $data_type;
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        $query = UrineRoutine::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', $this->data_type);
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('urine_routine_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("Physical Exam", "physical_exam")
                ->sortable(),
            Column::make("Quantity", "quantity")
                ->sortable(),
            Column::make("Colour", "colour")
                ->sortable(),
            Column::make("Appearance", "appearance")
                ->sortable(),
            Column::make("Deposits", "deposits")
                ->sortable(),
            Column::make("pH", "ph")
                ->sortable(),
            Column::make("Specific Gravity", "specific_gravity")
                ->sortable(),

            Column::make("RDW-CV", "rdw_cv")
                ->sortable(),


            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

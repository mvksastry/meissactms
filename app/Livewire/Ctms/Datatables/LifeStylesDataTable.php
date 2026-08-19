<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\LifeStyle;


class LifeStylesDataTable extends DataTableComponent
{
    protected $model = LifeStyle::class;
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
        $query = LifeStyle::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', '=', $this->data_type);
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('patient_lifestyle_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),
            Column::make("Cross Leg Sitting", "cross_leg_sitting")
                ->sortable(),
            Column::make("Standing", "standing")
                ->sortable(),
            Column::make("Sitting", "sitting")
                ->sortable(),
            Column::make("Life Style Description", "life_style_description")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

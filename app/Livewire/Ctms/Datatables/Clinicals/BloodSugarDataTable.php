<?php

namespace App\Livewire\Ctms\Datatables\Clinicals;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Clinicals\BloodSugar;

class BloodSugarDataTable extends DataTableComponent
{
    protected $model = BloodSugar::class;
    // Example: Pass an ID to filter by
    public $patient_uuid;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        $query = BloodSugar::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', '<>', 'pre-enrollment');
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('blood_sugar_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("Fasting", "fasting")
                ->sortable(),
            Column::make("Postprandial", "post_prandial")
                ->sortable(),
            Column::make("Random", "random")
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

}

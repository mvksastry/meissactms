<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\ModqScore;

class ModqScoreDataTable extends DataTableComponent
{
    protected $model = ModqScore::class;
    // Example: Pass an ID to filter by
    public $patient_uuid;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        $query = ModqScore::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', '<>', 'pre-enrollment');
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('modqscore_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),
            Column::make("Pain Intensity", "pain_intensity")
                ->sortable(),
            Column::make("Personal Care", "personal_care")
                ->sortable(),
            Column::make("Lifting", "lifting")
                ->sortable(),
            Column::make("Walking", "walking")
                ->sortable(),
            Column::make("Sitting", "sitting")
                ->sortable(),
            Column::make("Standing", "standing")
                ->sortable(),
            Column::make("Sleeping", "sleeping")
                ->sortable(),
            Column::make("Social Life", "social_life")
                ->sortable(),

            Column::make("Travelling", "travelling")
                ->sortable(),
            Column::make("Employment/Home Making", "employment_home_making")
                ->sortable(),
            Column::make("Total", "total")
                ->sortable(),
            Column::make("MODQ Score", "modq_score")
                ->sortable(),


            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

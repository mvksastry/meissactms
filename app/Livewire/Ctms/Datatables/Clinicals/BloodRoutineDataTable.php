<?php

namespace App\Livewire\Ctms\Datatables\Clinicals;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Clinicals\BloodRoutine;

class BloodRoutineDataTable extends DataTableComponent
{
    protected $model = BloodRoutine::class;
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
        $query = BloodRoutine::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', $this->data_type);
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('blood_routine_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("RBC", "rbc")
                ->sortable(),
            Column::make("HGB", "hgb")
                ->sortable(),
            Column::make("HCT", "hct")
                ->sortable(),
            Column::make("MCV", "mcv")
                ->sortable(),
            Column::make("MCH", "mch")
                ->sortable(),
            Column::make("MCHC", "mchc")
                ->sortable(),
            Column::make("RDW-SD", "rdw_sd")
                ->sortable(),
            Column::make("RDW-CV", "rdw_cv")
                ->sortable(),


            Column::make("PLT", "plt")
                ->sortable(),
            Column::make("PDW", "pdw")
                ->sortable(),
            Column::make("MPV", "mpv")
                ->sortable(),
            Column::make("PLCR", "plcr")
                ->sortable(),
            Column::make("PCT", "pct")
                ->sortable(),
            Column::make("WBC", "wbc")
                ->sortable(),
            Column::make("Neutrophils (Abs)", "neutrophils_abs")
                ->sortable(),
            Column::make("Neutrophils (Percent)", "neutrophils_percent")
                ->sortable(),

            Column::make("Lymphocytes (Abs)", "lymph_abs")
                ->sortable(),
            Column::make("Lymphocytes (Percent)", "lymph_percent")
                ->sortable(),
            Column::make("Monocytes (Abs)", "mono_abs")
                ->sortable(),
            Column::make("Monocytes (Percent)", "mono_percent")
                ->sortable(),
            Column::make("Eosinophils (Abs)", "eo_abs")
                ->sortable(),
            Column::make("Eosinophils (Percent)", "eo_percent")
                ->sortable(),
            Column::make("Basophils (Abs)", "baso_abs")
                ->sortable(),
            Column::make("Basophils (Percent)", "baso_percent")
                ->sortable(),

            Column::make("Ig Abs", "ig_abs")
                ->sortable(),
            Column::make("Ig Percent", "ig_percent")
                ->sortable(),
            Column::make("Observations", "observations")
                ->sortable(),


            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

}

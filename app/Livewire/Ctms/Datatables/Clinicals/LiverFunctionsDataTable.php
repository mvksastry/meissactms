<?php

namespace App\Livewire\Ctms\Datatables\Clinicals;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Clinicals\LiverFunction;

class LiverFunctionsDataTable extends DataTableComponent
{
    protected $model = LiverFunction::class;
    // Example: Pass an ID to filter by
    public $patient_uuid;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        $query = LiverFunction::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', '<>', 'pre-enrollment');
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('liver_function_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("Serum Total Protein", "serum_total_protein")
                ->sortable(),
            Column::make("Serum Albumin", "serum_albumin")
                ->sortable(),
            Column::make("Globulin", "globulin")
                ->sortable(),
            Column::make("A/G Ratio", "ag_ratio")
                ->sortable(),
            Column::make("Total Bilirubin", "total_bilirubin")
                ->sortable(),

            Column::make("Direct Bilirubin", "direct_bilirubin")
                ->sortable(),
            Column::make("Indirect Bilirubin", "indirect_bilirubin")
                ->sortable(),
            Column::make("SGOT", "sgot")
                ->sortable(),
            Column::make("SGPT", "sgpt")
                ->sortable(),

            Column::make("Alkaline Phosphatase", "alaline_phosphatase")
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

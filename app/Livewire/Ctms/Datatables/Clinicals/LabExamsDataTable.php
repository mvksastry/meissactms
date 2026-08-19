<?php

namespace App\Livewire\Ctms\Datatables\Clinicals;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Clinicals\LaboratoryExam;

class LabExamsDataTable extends DataTableComponent
{
    protected $model = LaboratoryExam::class;
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
        $query = LaboratoryExam::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', $this->data_type);
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('laboratory_exam_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("ESR", "esr")
                ->sortable(),
            Column::make("PT Patient", "pt_patient")
                ->sortable(),
            Column::make("PT Control", "pt_control")
                ->sortable(),
            Column::make("INR", "inr")
                ->sortable(),
            Column::make("ISI", "isi")
                ->sortable(),


            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

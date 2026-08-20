<?php

namespace App\Livewire\Ctms\Datatables\Clinicals;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Clinicals\MicroscopicExam;

class MicroscopicExamsDataTable extends DataTableComponent
{
    protected $model = MicroscopicExam::class;
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
        $query = MicroscopicExam::query();
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
        $this->setPrimaryKey('microscopic_exam_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),

            Column::make("PUS Cells", "pus_cells")
                ->sortable(),
            Column::make("Epithelial Cells", "epithelial_cells")
                ->sortable(),
            Column::make("RBCs", "rbcs")
                ->sortable(),
            Column::make("Yeast Cells", "yeast_cells")
                ->sortable(),
            Column::make("Bacteria", "bacteria")
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

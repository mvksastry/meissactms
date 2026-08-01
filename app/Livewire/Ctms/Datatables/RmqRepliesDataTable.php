<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\RMQReply;

class RmqRepliesDataTable extends DataTableComponent
{
    protected $model = RMQReply::class;
    // Example: Pass an ID to filter by
    public $patient_uuid;

    public function mount($patient_uuid)
    {
        $this->patient_uuid = $patient_uuid;
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        $query = RMQReply::query();

        // Apply WHERE clause if patient_uuid is set
        if ($this->patient_uuid) {
            $query->where('patient_uuid', $this->patient_uuid)->where('data_type', '<>', 'pre-enrollment');
        }

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('rmq_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),
            Column::make("RMQ Replies", "rmq_replies")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

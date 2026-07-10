<?php

namespace App\Livewire\Inventory\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Inventory\Consumption;

class ConsumptionReview extends DataTableComponent
{
    protected $model = Consumption::class;

    public function configure(): void
    {
        $this->setPrimaryKey('consumption_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Consumption id", "consumption_id")
                ->sortable(),
            Column::make("Pack mark code", "pack_mark_code")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Date used", "date_used")
                ->sortable(),
            Column::make("Product id", "product_id")
                ->sortable(),
            Column::make("Unit id", "unit_id")
                ->sortable(),
            Column::make("Quantity consumed", "quantity_consumed")
                ->sortable(),
            Column::make("Experiment id", "experiment_id")
                ->sortable(),
            Column::make("Experiment date", "experiment_date")
                ->sortable(),
            Column::make("Notes", "notes")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

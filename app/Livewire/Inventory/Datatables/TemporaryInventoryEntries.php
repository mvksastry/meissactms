<?php

namespace App\Livewire\Inventory\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Inventory\Tempproduct;

class TemporaryInventoryEntries extends DataTableComponent
{
    protected $model = Tempproduct::class;

    public $tempproduct_id, $id;

    public function configure(): void
    {
        $this->setPrimaryKey('temp_product_id');
    }

    public function columns(): array
    {
        return [
            Column::make('Actions')
            ->label(fn($row) => 
                '<button wire:click="viewDetails('.$row->temp_product_id.')">View</button>'
            )
            ->html(),
            Column::make("Temp product id", "temp_product_id")
                ->sortable(),
            Column::make("Pack mark code", "pack_mark_code")
                ->sortable(),
            Column::make("Category id", "category_id")
                ->sortable(),
            Column::make("Resproject id", "resproject_id")
                ->sortable(),
            Column::make("Grade", "grade")
                ->sortable(),
            Column::make("Catalog id", "catalog_id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Pack size", "pack_size")
                ->sortable(),
            Column::make("Unit id", "unit_id")
                ->sortable(),
            Column::make("Num packs", "num_packs")
                ->sortable(),
            Column::make("Mfd date", "mfd_date")
                ->sortable(),
            Column::make("Batch code", "batch_code")
                ->sortable(),
            Column::make("Vial cost", "vial_cost")
                ->sortable(),
            Column::make("Item currency", "item_currency")
                ->sortable(),
            Column::make("Item cost", "item_cost")
                ->sortable(),
            Column::make("Expiry date", "expiry_date")
                ->sortable(),
            Column::make("Supplier id", "supplier_id")
                ->sortable(),
            Column::make("Status open unopened", "status_open_unopened")
                ->sortable(),
            Column::make("Status date", "status_date")
                ->sortable(),
            Column::make("Quantity left", "quantity_left")
                ->sortable(),
            Column::make("Full empty", "full_empty")
                ->sortable(),
            Column::make("Storage container id", "storage_container_id")
                ->sortable(),
            Column::make("Shelf rack id", "shelf_rack_id")
                ->sortable(),
            Column::make("Box id", "box_id")
                ->sortable(),
            Column::make("Box position id", "box_position_id")
                ->sortable(),
            Column::make("Open storage", "open_storage")
                ->sortable(),
            Column::make("Enteredby id", "enteredby_id")
                ->sortable(),
            Column::make("Date entered", "date_entered")
                ->sortable(),
            Column::make("Product file", "product_file")
                ->sortable(),
            Column::make("Product file path", "product_file_path")
                ->sortable(),
            Column::make("Notes", "notes")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function viewDetails($id)
    {
        // Handle the action, e.g., redirect or open modal
        $this->id = $id;
        $this->tempproduct_id = $id;
        //$this->dispatch('uuid-selected', ['id' => $this->id]);
        $this->dispatch('productSelected', tempproduct_id: $this->tempproduct_id );
    }

    //-- pop up modal opening and responding --//
    public function selectedUuidPatient($id)
    {
        //dd($id);
        $this->id = $id;
        $this->tempproduct_id = $id;
        //dd($this->patient_uuid);
        $this->dispatch('tempproduct-selected', tempproduct_id: $this->tempproduct_id );
        //$this->patientInfoButtons = true;
    } 
}

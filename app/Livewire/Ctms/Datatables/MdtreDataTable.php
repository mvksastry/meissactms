<?php

namespace App\Livewire\Ctms\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

//Models
use App\Models\Ctms\Mdtre;

class MdtreDataTable extends DataTableComponent
{
    protected $model = Mdtre::class;
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
        $query = Mdtre::query();

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
        $this->setPrimaryKey('mdtre_exam_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd ID", "opd_id")
                ->sortable(),
            Column::make("Data Type", "data_type")
                ->sortable(),
            Column::make("Hip Flexion/Adduction", "hip_flex_adduction")
                ->sortable(),
            Column::make("Knee Extension", "knee_extension")
                ->sortable(),
            Column::make("Ankle Dorsiflexion", "ankle_dorsiflexion")
                ->sortable(),
            Column::make("Decreased Patellar Reflex", "decreased_patellar_reflex")
                ->sortable(),
            Column::make("Extensor Hallucis Longus", "extensor_hallucis_longus")
                ->sortable(),
            Column::make("Hip Abduction", "hip_abduction")
                ->sortable(),
            Column::make("Ankle Plantar Flexion", "ankle_plantar_flexion")
                ->sortable(),
            Column::make("Decreased Achilles Tendon Reflex", "dec_achilles_tendon_reflex")
                ->sortable(),
            Column::make("Straight Leg Raise", "straight_leg_raise")
                ->sortable(),
            Column::make("Contralateral SLR", "contralateral_slr")
                ->sortable(),
            Column::make("Femoral Nerve Stretch Test", "femoral_nerve_stretch_test")
                ->sortable(),
            Column::make("Trendelenburg Gait", "trendelenburg_gait")
                ->sortable(),
            Column::make("Antalgic Gait", "antalgic_gait")
                ->sortable(),
            Column::make("List", "list")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

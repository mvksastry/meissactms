<?php

namespace App\Livewire\EHub;

use Livewire\Component;

//models
use App\Models\Ctms\Activity;

class ProductionHub extends Component
{
    public $productionActivities;

    public function render()
    {
        //This query can show that only patients who can be identified
        $this->productionActivities = Activity::where('code', 'mfg')
                                                ->where('enrollment_id', '<>', null)
                                                ->where('status','active')
                                                ->get();


        return view('livewire.e-hub.production-hub');
    }

    public function fnCreateNewChondrocyteMfr()
    {
        dd("reached new record");
    }
}

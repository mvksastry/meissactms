<?php

namespace App\Livewire\Ctms\Patients\Clinicals;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Clinicals\DrugCategory;
//use App\Models\Ctms\Clinicals\DrugDetails;

//logs
use Illuminate\Support\Facades\Log;

class DrugCategories extends Component
{
    public $sys_panel, $msg_panel;
    //forms
    //public $cat_p = false;
    //public $p1 = false, $p2 = false, $p3 = false;

    //public $patient_uuid;

    //variables
    public $ncDCat = [], $drug_categories;

    public function render()
    {   $this->drug_categories = DrugCategory::all();
        return view('livewire.ctms.patients.clinicals.drug-categories');
    }

    public function fnCreateNewCategory()
    {
        //dd("complete posting");
        $input = $this->ncDCat;
        //dd($input);
        $nCate = new DrugCategory();

        $nCate->category_name = $input['name'];
        $nCate->description = $input['desc'];
        $nCate->posted_by = Auth::user()->name;
        //dd($nCate);
        $nCate->save();
        $this->ncDCat = [];
        $this->drug_categories = DrugCategory::all();

    }
}

<?php

namespace App\Imports\TCtms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

//live import from excel
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

//Validations
use Illuminate\Support\Facades\Validator;

// Traits
use App\Traits\Base;
// Models
use App\Models\Inventory\Products;
//use App\Models\Inventory\Tempproduct;

class BulkInventoryImport implements ToCollection, WithHeadingRow
{
    use Base;
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $impArray = array_filter($rows->toArray(), 'array_filter');
        $finArray = array_filter($impArray);
        
        $rowNum = 1;
        //$this->nee = [];
        //dd($rows, $finArray);
       /*
        Validator::make($rows->toArray(), [
             '*.sample_code' => 'required',
             '*.description' => 'required',
             '*.type' => 'required',
             '*.species' => 'required',
             '*.bulk_code' => 'required',
             '*.source' => 'required',
             '*.source_ref' => 'required',
             '*.sample_remark' => 'required',
             '*.tags' => 'required',
             '*.repository_id' => 'required',
             '*.compartment_id' => 'required',
             '*.holder_id' => 'required',
             '*.box_id' => 'required',
         ])->validate();
         */

        foreach($finArray as $row)
        {
            //dd($row);           
            $this->ne['pack_mark_code']       = $this->generateCode(6);
            $this->ne['category_id']          = $row['category_id'];
            $this->ne['resproject_id']        = $row['resproject_id'];
            $this->ne['grade']                = $row['grade'];
            $this->ne['catalog_id']           = $row['catalog_id'];
            $this->ne['name']                 = $row['name'];
            $this->ne['pack_size']            = $row['pack_size'];
            $this->ne['unit_id']              = $row['unit_id'];
            $this->ne['num_packs']            = $row['num_packs'];
            //$this->ne['mfd_date'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['mfd_date']))->format('Y-m-d');
            $this->ne['mfd_date']             = $row['mfd_date'];
            $this->ne['batch_code']           = $row['batch_code'];
            $this->ne['vial_cost']            = $row['vial_cost'];
            $this->ne['item_currency']        = $row['item_currency'];
            $this->ne['item_cost']            = $row['item_cost'];
            $this->ne['expiry_date']          = $row['expiry_date'];
            $this->ne['supplier_id']          = $row['supplier_id'];
            $this->ne['status_open_unopened'] = $row['status_open_unopened'];
            $this->ne['status_date']          = $row['status_date'];
            $this->ne['quantity_left']        = $row['quantity_left'];
            $this->ne['full_empty']           = $row['full_empty'];
            $this->ne['storage_container_id'] = $row['storage_container_id'];
            $this->ne['shelf_rack_id']        = $row['shelf_rack_id'];
            $this->ne['box_id']               = $row['box_id'];
            $this->ne['box_position_id']      = $row['box_position_id'];
            $this->ne['open_storage']         = $row['open_storage'];
            $this->ne['enteredby_id']         = $row['enteredby_id'];
            $this->ne['date_entered']         = date('Y-m-d');
            $this->ne['office_review']        = 'draft';
            $this->ne['off_rev_date']         = date('Y-m-d');
            $this->ne['notes']                = $row['notes'];
            //dd($this->ne);
            $result =  Products::create($this->ne);

            /*
            $xne = new Tempproduct();

            $xne->pack_mark_code       = $this->generateCode(6);
            $xne->category_id          = $row['category_id'];
            $xne->resproject_id        = $row['resproject_id'];
            $xne->grade                = $row['grade'];
            $xne->catalog_id           = $row['catalog_id'];
            $xne->name                 = $row['name'];
            $xne->pack_size            = $row['pack_size'];
            $xne->unit_id              = $row['unit_id'];
            $xne->num_packs            = $row['num_packs'];
            $xne->mfd_date             = $row['mfd_date'];
            $xne->batch_code           = $row['batch_code'];
            $xne->vial_cost            = $row['vial_cost'];
            $xne->item_currency        = $row['item_currency'];
            $xne->item_cost            = $row['item_cost'];
            $xne->expiry_date          = $row['expiry_date'];
            $xne->supplier_id          = $row['supplier_id'];
            $xne->status_open_unopened = $row['status_open_unopened'];
            $xne->status_date          = $row['status_date'];
            $xne->quantity_left        = $row['quantity_left'];
            $xne->full_empty           = $row['full_empty'];
            $xne->storage_container_id = $row['storage_container_id'];
            $xne->shelf_rack_id        = $row['shelf_rack_id'];
            $xne->box_id               = $row['box_id'];
            $xne->box_position_id      = $row['box_position_id'];
            $xne->open_storage         = $row['open_storage'];
            $xne->enteredby_id         = $row['enteredby_id'];
            $xne->date_entered         = $row['date_entered'];
            //$xne->product_file         = $row['product_file'];
            //$xne->product_file_path    = $row['product_file_path'];
            $xne->notes                = $row['notes'];

            //dd($xne);

            $xne->save();
            */

            /*
            'sample_code'    => $row['sample_code'],
            'description'    => $row['description'],
            'type'           => $row['type'], 
            'species'        => $row['species'],
            'bulk_code'      => $row['bulk_code'],
            'series_code'    => $row['series_code'],
            'source'         => $row['source'],
            'source_ref'     => $row['source_ref'],
            'posted_by'      => Auth::user()->id,
            'posted_name'    => Auth::user()->name,
            'posted_date'    => date('Y-m-d'),
            'sample_remark'  => $row['sample_remark'],
            'tags'           => $row['tags'],
            'repository_id'  => $row['repository_id'],
            'compartment_id' => $row['compartment_id'],
            'holder_id'      => $row['holder_id'],
            'box_id'         => $row['box_id']
            */

        
            //array_push($this->nee, $this->ne);
            $rowNum = $rowNum + 1;
        }

        //dd($this->nee);
        //return $this->nee;
    }
}

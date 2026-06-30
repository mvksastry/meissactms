<?php

namespace App\Imports\TCtms;

use App\Models\Inventory\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class BulkInventoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            //
        ]);
    }
}

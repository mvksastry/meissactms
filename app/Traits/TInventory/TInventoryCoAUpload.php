<?php

namespace App\Livewire\TInventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Inventory\Products;
use App\Models\Inventory\COAs;

//Livewire Alerts
//use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use Illuminate\Support\Facades\Log;
// Log trails recorder
use Carbon\Carbon;
use Illuminate\Log\Logger;

//Traits
use App\Traits\Base;

trait TInventoryCoAUpload
{
  use Base;

    public function uploadCoAFile()
    {
        $bpath = "app/public";
        $def_file_path = "skls/inventory/";

        $file_path = $def_file_path.'coas/valid/';
        $file_input['product_id'] = $this->tempproduct_id;
        $file_input['file_code'] = 222;
        $file_input['file_uuid'] = Str::uuid()->toString();

        $file_input['coa_status'] = 'valid';
        $file_input['uploaded_by'] = Auth::user()->id;
        $file_input['date_created'] = date('Y-m-d');

        $file_input['file_name'] = $this->generateCode(12).'.'.$this->product_coa->getClientOriginalExtension();
        $file_input['file_path'] = $file_path;
        //dd($input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($this->tempproduct_id, $file_input['file_code']);
        
        if($oldfile){
            $ttpath = "app/public/skls/inventory/coas/archieve/";
            $t_path = storage_path($ttpath);
            $pathTest = File::isDirectory($t_path);
            //dd($pathTest);
            if (!$pathTest) {
                mkdir($t_path, $mode = 0775, $recursive = true);
                //dd("dir created");
            }
            // set destination directory for moving the file
            $to_path = "skls/inventory/coas/archieve/";
            //move that file unwanted directory
            File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
            
            //after moving get the path and update database of that file.
            $oldfile->file_path = $to_path;
            //after moving set the status to invalid
            $oldfile->report_status = 'invalid';
            //now save the file.
            $oldfile->save();
            LivewireAlert::title('Old File Moved...')->info()->asToast()->show();
            //now put new file in directory
            //$path = $this->product_coa->storeAs($file_path, $file_input['file_name'], 'public' );
            //now make database entry             
        } 

        //now since we have taken care o fthe old file, now save it.
        $path = $this->product_coa->storeAs($file_path, $file_input['file_name'], 'public');
        LivewireAlert::title('New File Uploaded...')->info()->asToast()->show();
        //now enter into the db table.
        $newCoa = new COAs();
        $newCoa->product_id = $this->tempproduct_id;
        $newCoa->file_code = $file_input['file_code'];
        $newCoa->file_uuid = $this->fileUuid();
        $newCoa->file_name = $file_input['file_name'];
        $newCoa->file_path = $file_input['file_path'];
        $newCoa->coa_status = 'valid';
        $newCoa->uploaded_by = Auth::user()->id;
        $newCoa->date_created = date('Y-m-d');
        $newCoa->save();
        $this->iter1++;
        //dd($input, $oldfile);
        LivewireAlert::title('New File Data Saved...')->info()->asToast()->show();
    }

    public function getOldFileInfo($tempproduct_id, $code)
    {
        return $oldfile = COAs::where('product_id', $tempproduct_id)
                                    ->where('file_code', $code)
                                    ->where('coa_status', 'valid')
                                    ->first();
    }
}